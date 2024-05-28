function show_loading_page(divId_preloading, divId_content){

    document.addEventListener("DOMContentLoaded", function() {
        loader = divId_preloading; 
        loadNow(1);
    });

    var loader;
    function loadNow(opacity) {
        if (opacity <= 0) {
            displayContent();
        } else {
            loader.style.opacity = opacity;
            window.setTimeout(function() {
                loadNow(opacity - 0.05);
            }, 100);
        }
    }

    function displayContent() {
        loader.style.display = 'none';
        divId_content.style.display = 'block';
    }      
}