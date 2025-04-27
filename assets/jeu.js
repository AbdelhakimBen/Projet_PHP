
// Jeu de mémoire
let flipped = [];
let matchedPairs = 0;
const totalPairs = document.querySelectorAll('.card').length / 2;
const memoryContainer = document.querySelector(".memory-grid");

document.querySelectorAll('.card').forEach(card => {
    const img = card.querySelector('img');
    img.classList.add('hidden');

    card.addEventListener('click', () => {
        if (img.classList.contains('hidden') && flipped.length < 2) {
            img.classList.remove('hidden');
            card.classList.add('flipped');
            flipped.push({ id: card.dataset.id, card: card });

            if (flipped.length === 2) {
                const [first, second] = flipped;
                if (first.id === second.id && first.card !== second.card) {
                    setTimeout(() => {
                        first.card.style.visibility = 'hidden';
                        second.card.style.visibility = 'hidden';
                        flipped = [];
                        matchedPairs++;
                        if (matchedPairs === totalPairs) {
                            const congrats = document.createElement('h2');
                            congrats.textContent = "🎉 Bravo, tu as trouvé toutes les paires !";
                            congrats.style.color = "#4CAF50";
                            congrats.style.textAlign = "center";
                            memoryContainer.appendChild(congrats);
                        }
                    }, 500);
                } else {
                    setTimeout(() => {
                        flipped.forEach(f => {
                            f.card.querySelector('img').classList.add('hidden');
                            f.card.classList.remove('flipped');
                        });
                        flipped = [];
                    }, 1000);
                }
            }
        }
    });
});

// COMPLÉTER LE MOT
function checkMot(choix, correct) {
    const res = document.getElementById("mot-result");
    const motDisplay = document.querySelector("#mot-complet");
    const audio = document.querySelector("#audio-mot");

    if (choix === correct) {
        res.textContent = "✅ Bravo !";
        res.style.color = "green";
        motDisplay.textContent = motDisplay.dataset.mot;
        if (audio) {
            audio.play();
        }
    } else {
        res.textContent = "❌ Mauvaise réponse !";
        res.style.color = "red";
    }
}

// TROUVER L'INTRUS
let referenceCategory = null;
function checkIntrus(img, catId) {
    if (!referenceCategory) {
        const counts = {};
        document.querySelectorAll('.intrus-img').forEach(i => {
            const id = i.getAttribute('onclick').match(/, (\d+)\)/)[1];
            counts[id] = (counts[id] || 0) + 1;
        });
        referenceCategory = Object.entries(counts).reduce((a, b) => a[1] > b[1] ? a : b)[0];
    }

    const result = document.getElementById("intrus-result");
    if (catId != referenceCategory) {
        result.textContent = "✅ Bravo, c'était bien l'intrus !";
        result.style.color = "green";
    } else {
        result.textContent = "❌ Ce n'est pas l'intrus.";
        result.style.color = "red";
    }
}
