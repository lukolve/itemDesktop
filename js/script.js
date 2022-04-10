/* Author:
selfsame
*/
debug = true
window.files = {};
window.drag = false;
window.target = false;
window.mousex = 0; window.mousey = 0;
window.zheight = 0;

$(window).mousedown(function(e) {
  window.mousex = e.clientX;
  window.mousey = e.clientY;
  document.body.classList.add("mousedown")
});

$(window).mousemove(function(e) {
  if (window.drag) {
    x = e.clientX; y = e.clientY;
    dx = x - window.mousex;
    dy = y - window.mousey;
    window.mousex = x; window.mousey = y;
    e["dx"] = dx; e["dy"] = dy;
    window.drag(e, window.target);
  }
});

$(window).mouseup(function(e){
  window.drag = false;
  window.target = false;
  document.body.classList.remove("mousedown")
});

$(window).ready(function () {});

$(window).load(function () {
  $.getJSON("public.json", parse_files)
});

var img_data = function(img){
  var canvas = document.createElement('canvas');
  var context = canvas.getContext('2d');
  canvas.width = img.width;
  canvas.height = img.height;
  context.drawImage(img, 0, 0 );
  return context.getImageData(0, 0, img.width, img.height);
}

var data_url = function(img, data){
  var canvas = document.createElement('canvas');
  var context = canvas.getContext('2d');
  canvas.width = img.width;
  canvas.height = img.height;
  context.putImageData(data, 0, 0 );
  return canvas.toDataURL();
}


var get_mime = function(s){
  var match = s.match( /\.([^\.]*)$/)
  if (match) {
    return match[match.length-1]
  }
}

var contains = function(ar, v){
  return ar.indexOf(v) != -1
}

img_mimes = ["gif", "png", "jpg", "bmp"]

make_icon = function(name, path, ide){
  if (debug) {console.log("make_icon",name, path)};
  mime = get_mime(name)
  icon = "img/icon-doc.png"
  if (mime == "zip") {
    icon = "img/zip.png"
  }
  if (contains(img_mimes, mime)){
    icon = "img/img.png"
  } 
  var file = $("<div class='file' id='file-"+ide+"'><a href='"+path+
      "'><img src='"+icon+"'><p><span class='name'>"+name+"</span></p></a></div>");
  if (contains(img_mimes, mime)){
    file[0].onclick = function(e){
      e.preventDefault()
      var w = raw_window(name)
      w.addClass("image")
      var view = w.find('.view')
      view.append($("<img src='./"+path+"'>"))
      var img = view.find('img')
      img[0].onload = function(e){
        var id = monochrome(img_data(e.target) )
        e.target.src = data_url(e.target, id)
        e.target.onload = null
      }
    }
  }
  if ((mime == "html")||(mime == "php")){
    file[0].onclick = function(e){
      e.preventDefault()
      var w = raw_window(name)
      w.addClass("html")
      w[0].style.width = "600px"
      w[0].style.height = "480px"
      var view = w.find('.view')
      view.append($("<iframe src='./"+path+"'>"))
      var iframe = view.find('iframe')
    }
  }
  return file
}

make_folder = function(target, dir, name){
  if (debug) {console.log("make_folder", target, dir, name)};
  folder = $("<div class='folder file'><img src='img/icon-folder.png'><p><span class='name'>"+name+"</span></p></a></div>")
  folder.on("click", function(e){
    make_window(dir, name);});
  return folder
}

raw_window = function(name){
  var window_count = $('.window').length
  f = $("<div class='window'><div class='bar'>"+
    "<p><span class='name'>"+name+"</span></p>"+
    "<div class='close'></div></div>"+
    "<div class='view'></div><div class='resize'></div></div>")
  const div = document.getElementById('tasks');
  div.insertAdjacentHTML('afterend', `<div class="menu"><p>`+name+`</p></div>`);
  f.find('.close').on("click", function(e){$(e.target).parents('.window').detach();});
  f.find('.bar').on("mousedown", function(e){
    window.drag = function(e, target){
      o = target.offset();
      o.left += e.dx; 
      o.top += e.dy;
      if (o.top < 20){ o.top = 20}
      if (o.left < 1){ o.left = 1}

      target.offset(o)
    }
    window.target = $(e.target).parents('.window');
    window.zheight += 1;
    window.target.css('z-index', window.zheight);
  })
  f.find('.resize').on("mousedown", function(e){
    window.drag = function(e, target){
      target.width(target.width() + e.dx);
      target.height(target.height() + e.dy); 
    }
    window.target = $(e.target).parents('.window');
  })
  f[0].style.top = 20+(window_count*25)+"px"
  f[0].style.left = 20+(window_count*10)+"px"
  $('#desktop').append(f);
  return f
}

make_window = function(dir, name){
  if (debug) {console.log("make_window", dir, name)};
  var f = raw_window(name)
  create_dir(f.find('.view'), dir)
}



parse_files = function(e){
  for (var k in e) {
    cursor = window.files
    sp = k.split("/");
    for(var i = 0; i < sp.length; i++) {
      var part = sp[i];
      if (!cursor[part]) {
        cursor[part] = (i == sp.length - 1 ? k : {});
      }
      cursor = cursor[part];
    }
  }
  create_dir($('#desktop'), window.files);
}

create_dir = function(target, dir){
  var i = 0;
  for (var k in dir){
    v = dir[k];
    if (typeof(v) == "string"){
      target.append(make_icon(k, v, i));
	  i++;
    } else {
      target.prepend(make_folder(target, dir[k], k));
    }
  }
}


test_mime = function(filename){
	return filename.substring(filename.lastIndexOf('.')+1, filename.length) || filename;
}

// Make the DIV element draggable:
dragElement("file-0");
dragElement("file-1");

function dragElement(filer) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  // get the mouse cursor position at startup:
  var elmnt=document.getElementById(filer);
  pos3 = elmnt.clientX;
  pos4 = elmnt.clientY;
  if (document.getElementById(filer)) {
    // if present, the header is where you move the DIV from:
    document.getElementById(filer).onmousedown = dragMouseDown; //elmnt.id + "header"
  } else {
    // otherwise, move the DIV from anywhere inside the DIV:
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }

  function closeDragElement() {
    // stop moving when mouse button is released:
    document.onmouseup = null;
    document.onmousemove = null;
  }
}


// Highlighter
// Selection: thx http://www.javascriptkit.com/javatutors/copytoclipboard.shtml :)
function getSelectedText() {
  var selection = "";
  if (window.getSelection) {
    var selection = window.getSelection().toString();
  }
  return selection
};
// Replacement: thx https://stackoverflow.com/questions/3362747/how-to-insert-an-element-at-selected-position-in-html-document/3363087#3363087
function replaceSelection(replacement) {
  var range, html;
  if (window.getSelection && window.getSelection().getRangeAt) {
    range = window.getSelection().getRangeAt(0);
    range.deleteContents();
    range.insertNode(replacement);
  } else if (document.selection && document.selection.createRange) {
    range = document.selection.createRange();
    html = (replacement.nodeType == 3) ? replacement.data : replacement.outerHTML;
    range.pasteHTML(html);
  }
}

document.addEventListener("mouseup", function() {
  var selectedText = getSelectedText();
  if (selectedText.length > 0) {
    console.log(selectedText);
    mark = document.createElement("mark");
    mark.innerHTML = selectedText.trim();
    mark.classList.add("highlight");
    replaceSelection(mark);
  }
});
