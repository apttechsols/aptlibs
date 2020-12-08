function apt_async_jquery_kit_v0_1_includes_html_by_class(data={}) {
    if ('class' in data){
        data['attr'] = data['class'];
    }
    
    var z, i, elmnt, file, xhttp;
    /*loop through a collection of all HTML elements:*/
    z = document.getElementsByClassName(data['class']);
    for (i = 0; i < z.length; i++) {
      elmnt = z[i];
      /*search for elements with a certain atrribute:*/
      file = elmnt.getAttribute(data['attr']);
      if (file) {
        /*make an HTTP request using the attribute value as the file name:*/
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4) {
            if (this.status == 200) {elmnt.innerHTML = this.responseText;}
            if (this.status == 404) {console.log("Page not found.");}
            // var cnt = $(".remove-just-this").contents();
            // $(".remove-just-this").replaceWith(cnt);
            /*remove the attribute, and call this function once more:*/
            elmnt.removeAttribute(data['attr']);
            apt_async_jquery_kit_v0_1_includes_html_by_class({'class':data['class']});
          }
        }      
        xhttp.open("GET", file, true);
        xhttp.send();
        /*exit the function:*/
        return;
      }
    }
};