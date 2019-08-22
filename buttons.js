var autoExpandingTextArea = (function(){
  var tag = document.querySelectorAll('textarea');
 
  for (var i=0; i<tag.length; i++){
    tag[i].addEventListener('paste',autoExpand);
    tag[i].addEventListener('input',autoExpand);
    tag[i].addEventListener('keyup',autoExpand);
  }
  
  function autoExpand(e,el){
    var el = el || e.target;
    var paddingTop = parseInt(window.getComputedStyle(el, null).getPropertyValue('padding-top'));
    var paddingBottom = parseInt(window.getComputedStyle(el, null).getPropertyValue('padding-bottom'));
    el.style.height = 'auto';
    console.log(el.scrollHeight);
    el.style.height = (el.scrollHeight - (paddingTop + paddingBottom)) + 'px';
  }
  
  window.addEventListener('load',expandAll);
  window.addEventListener('resize',expandAll);
  
  function expandAll(e){
    var tag = document.querySelectorAll('textarea');
    
    for (var i=0; i<tag.length; i++){
      autoExpand(e,tag[i]);
    }
  }
})();
