document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('searchInput');
    const productsSection = document.querySelector('.products-section');
    const productCards = document.querySelectorAll('.product-card');
    const noResults = document.getElementById('noResults');
    const heroSection = document.getElementById('hero-section');
    const newsletterSection = document.querySelector('.bg-emerald-50');
    let debounceTimer;

    function initializeProductSearch() {
        if (!searchInput) return;

        searchInput.addEventListener('input', function (e) {
            clearTimeout(debounceTimer);

            debounceTimer = setTimeout(() => {
                const searchTerm = e.target.value.toLowerCase().trim();
                handleSearch(searchTerm);
            }, 300);
        });
    }

    function handleSearch(searchTerm) {
        if (searchTerm === '') {
            resetView();
            return;
        }


        if (heroSection) heroSection.classList.add('hidden');
        if (newsletterSection) newsletterSection.classList.add('hidden');

        let foundAny = false;
        const relevanceMap = new Map();


        productCards.forEach(card => {
            const productName = card.querySelector('.product-name')?.textContent.toLowerCase() || '';
            const productDesc = card.querySelector('.product-description')?.textContent.toLowerCase() || '';

            let relevanceScore = calculateRelevance(searchTerm, productName, productDesc);

            if (relevanceScore > 0) {
                card.classList.remove('hidden');
                relevanceMap.set(card, relevanceScore);
                foundAny = true;
            } else {
                card.classList.add('hidden');
            }
        });

        updateProductDisplay(foundAny, relevanceMap);
    }

    function calculateRelevance(searchTerm, productName, productDesc) {
        let score = 0;


        if (productName.includes(searchTerm)) score += 3;


        searchTerm.split(' ').forEach(term => {
            if (productName.includes(term)) score += 2;
        });


        if (productDesc.includes(searchTerm)) score += 1;

        return score;
    }

    function updateProductDisplay(foundAny, relevanceMap) {
        if (!foundAny) {
            if (noResults) noResults.classList.remove('hidden');
            return;
        }

        if (noResults) noResults.classList.add('hidden');


        const productsContainer = productCards[0].parentElement;
        const sortedCards = Array.from(relevanceMap.entries())
            .sort((a, b) => b[1] - a[1])
            .map(entry => entry[0]);

        sortedCards.forEach(card => productsContainer.appendChild(card));
    }

    function resetView() {

        if (heroSection) heroSection.classList.remove('hidden');
        if (newsletterSection) newsletterSection.classList.remove('hidden');


        productCards.forEach(card => card.classList.remove('hidden'));


        if (noResults) noResults.classList.add('hidden');
    }


    initializeProductSearch();
});