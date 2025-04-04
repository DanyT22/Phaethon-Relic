document.addEventListener('DOMContentLoaded', function() {
    let filters = document.querySelectorAll(".btn-filtre");

    function active(x){
        x.classList.add("active");
    }

    function desactive(x){
        x.classList.remove("active")
    }

    function afficher(x){
        x.classList.remove("hidden");
        x.classList.add("flex");
    }

    function enlever(x){
        x.classList.remove("flex");
        x.classList.add("hidden");
    }

    for(let filter of filters) {
        filter.addEventListener("click", function() {
            let personnages = document.querySelectorAll("#grid-filtrable a");
            let tag = this.id.toLowerCase();
            let isActive = this.classList.contains("active");

            if (isActive) {
                desactive(this)
                personnages.forEach(afficher);
            } else {
                filters.forEach(desactive);
                active(this)

                for(let personnage of personnages) {
                    if(tag in personnage.dataset) {
                        afficher(personnage)
                    } else {
                        enlever(personnage)
                    }
                }
            }
        });
    }
});