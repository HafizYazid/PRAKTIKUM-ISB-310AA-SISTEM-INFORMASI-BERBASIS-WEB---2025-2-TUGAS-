// App JavaScript

// Search functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-input');
    const categoryFilter = document.getElementById('category-filter');
    const sortFilter = document.getElementById('sort-filter');
    const productCards = document.querySelectorAll('.product-card');

    function filterProducts() {
        const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';
        const categoryValue = categoryFilter ? categoryFilter.value : '';
        const sortValue = sortFilter ? sortFilter.value : '';

        productCards.forEach(card => {
            const name = card.querySelector('.product-name').textContent.toLowerCase();
            const description = card.querySelector('.product-description').textContent.toLowerCase();
            const categories = card.dataset.categories ? card.dataset.categories.toLowerCase() : '';

            const matchesSearch = name.includes(searchTerm) || description.includes(searchTerm);
            const matchesCategory = !categoryValue || categories.includes(categoryValue);

            if (matchesSearch && matchesCategory) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Add event listeners
    if (searchInput) {
        searchInput.addEventListener('input', filterProducts);
    }
    if (categoryFilter) {
        categoryFilter.addEventListener('change', filterProducts);
    }
    if (sortFilter) {
        sortFilter.addEventListener('change', function() {
            const value = this.value;
            const container = document.getElementById('products');

            if (!container) return;

            const cards = Array.from(container.children);

            if (value === 'price-asc') {
                cards.sort((a, b) => {
                    const priceA = parseFloat(a.querySelector('.product-price').textContent.replace(/[^\d]/g, ''));
                    const priceB = parseFloat(b.querySelector('.product-price').textContent.replace(/[^\d]/g, ''));
                    return priceA - priceB;
                });
            } else if (value === 'price-desc') {
                cards.sort((a, b) => {
                    const priceA = parseFloat(a.querySelector('.product-price').textContent.replace(/[^\d]/g, ''));
                    const priceB = parseFloat(b.querySelector('.product-price').textContent.replace(/[^\d]/g, ''));
                    return priceB - priceA;
                });
            } else if (value === 'name') {
                cards.sort((a, b) => {
                    const nameA = a.querySelector('.product-name').textContent.toLowerCase();
                    const nameB = b.querySelector('.product-name').textContent.toLowerCase();
                    return nameA.localeCompare(nameB);
                });
            }

            cards.forEach(card => container.appendChild(card));
        });
    }
});

// Auto-hide alerts after 5 seconds
document.addEventListener('DOMContentLoaded', function() {
    const alerts = document.querySelectorAll('.alert-success, .alert-error');
    alerts.forEach(function(alert) {
        setTimeout(function() {
            alert.style.opacity = '0';
            setTimeout(function() {
                alert.remove();
            }, 300);
        }, 5000);
    });
});

// Confirm delete actions
function confirmDelete(message = 'Are you sure you want to delete this item?') {
    return confirm(message);
}