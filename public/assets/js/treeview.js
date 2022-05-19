var tree = document.getElementById("tree1");
if (tree) {
    tree.querySelectorAll("ul").forEach(function(el, key, parent) {
        var elm = el.parentNode;
        elm.classList.add("branch");
        var x = document.createElement("i");
        x.classList.add("indicator");
        x.classList.add("bi-folder-plus");
        elm.insertBefore(x, elm.firstChild);
        el.classList.add("collapse");

        elm.addEventListener("click", function(event) {
            if (elm === event.target || elm === event.target.parentNode) {

                if (el.classList.contains('collapse')) {
                    el.classList.add("expand");
                    el.classList.remove("collapse");
                    x.classList.remove("bi-folder-plus");
                    x.classList.add("bi-folder-minus");
                } else {
                    el.classList.add("collapse");
                    el.classList.remove("expand");
                    x.classList.remove("bi-folder-minus");
                    x.classList.add("bi-folder-plus");
                }
            }
        }, false);
    });
}