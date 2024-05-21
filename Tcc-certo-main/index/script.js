function filterGames() {
    const categoryFilter = document.getElementById('categoryFilter').value;
    const priceFilter = document.getElementById('priceFilter').value;
    const cards = document.querySelectorAll('.card');

    cards.forEach(card => {
        const category = card.getAttribute('data-category');
        const price = parseFloat(card.getAttribute('data-price'));
        let categoryMatch = categoryFilter === 'all' || category === categoryFilter;
        let priceMatch;

        switch(priceFilter) {
            case 'menor30':
                priceMatch = price <= 30;
                break;
            case 'menor25':
                priceMatch = price <= 25;
                break;
            case 'menor50':
                priceMatch = price <= 50;
                break;
            case 'menor100':
                priceMatch = price <= 100;
                break;
            
            default:
                priceMatch = true;
        }

        if (categoryMatch && priceMatch) {
            card.style.display = '';
        } else {
            card.style.display = 'none';
        }
    });
}