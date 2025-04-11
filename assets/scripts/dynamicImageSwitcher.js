document.addEventListener('turbo:load', () => {
    const selectPerso = document.getElementById('builds_personnage');
    const selectMoteur = document.getElementById('builds_moteur');
    const selectSet = document.getElementById('disques_ensemble');
    const imagePerso = document.getElementById('personnage_img');
    const imageMoteur = document.getElementById('moteur_img');
    const imageSet = document.getElementById('set_img');

    if (selectPerso && imagePerso) {
        const value = selectPerso.value;
        if (value) {
            imagePerso.src = `/images/profils/${value}.webp`;
        }
        selectPerso.addEventListener('change', () => {
            const value = selectPerso.value;
            if (value) {
                imagePerso.src = `/images/profils/${value}.webp`;
            }
        });
    }

    if (selectMoteur && imageMoteur) {
        const value = selectMoteur.value;
        if (value) {
            imageMoteur.src = `/images/moteurs/${value}.webp`;
        }
        selectMoteur.addEventListener('change', () => {
            const value = selectMoteur.value;
            if (value) {
                imageMoteur.src = `/images/moteurs/${value}.webp`;
            }
        });
    }

    if (selectSet && imageSet) {
        const value = selectSet.value;
        if (value) {
            imageSet.src = `/images/set/${value}.webp`;
        }
        selectSet.addEventListener('change', () => {
            const value = selectSet.value;
            if (value) {
                imageSet.src = `/images/set/${value}.webp`;
            }
        });
    }
});
