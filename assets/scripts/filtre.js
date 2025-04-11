document.addEventListener('turbo:load', () => {
    const filters = document.querySelectorAll(".btn-filtre");
    const personnages = document.querySelectorAll("#grid-filtrable a");

    function toggleAffichage(element, show) {
        element.classList.toggle("hidden", !show);
        element.classList.toggle("flex", show);
    }

    filters.forEach(filter => {
        filter.addEventListener("click", () => {
            const tag = filter.id.toLowerCase();
            const isActive = filter.classList.contains("active");

            filters.forEach(f => f.classList.remove("active"));

            if (isActive) {
                personnages.forEach(p => toggleAffichage(p, true));
            } else {

                filter.classList.add("active");

                personnages.forEach(p => {
                    const match = tag in p.dataset;
                    toggleAffichage(p, match);
                });
            }
        });
    });
});