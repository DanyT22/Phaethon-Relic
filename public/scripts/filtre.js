function initFiltre() {

    console.log("filtre chargé ma gueule ! ")
    const filters = document.querySelectorAll(".btn-filtre");
    const personnages = document.querySelectorAll("#grid-filtrable a");

    if (!filters.length || !personnages.length) return;

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
}

// Pour compatibilité normale + Turbo
document.addEventListener('DOMContentLoaded', initFiltre);
document.addEventListener('turbo:load', initFiltre);
document.addEventListener('turbo:render', initFiltre); // Ajouté pour les rendus partiels

// Initialisation immédiate si le DOM est déjà chargé
if (document.readyState !== 'loading') {
    initFiltre();
}