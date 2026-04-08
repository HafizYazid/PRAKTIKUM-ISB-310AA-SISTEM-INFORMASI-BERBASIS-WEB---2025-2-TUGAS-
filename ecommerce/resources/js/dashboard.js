document.addEventListener('DOMContentLoaded', () => {
  const searchInput = document.getElementById('search-input');
  const categoryFilter = document.getElementById('category-filter');
  const sortFilter = document.getElementById('sort-filter');

  // Search functionality
  if (searchInput) {
    searchInput.addEventListener('input', (e) => {
      const searchTerm = e.target.value.toLowerCase();
      console.log('Searching for:', searchTerm);
      // Filter products by search term
    });
  }

  // Category filter
  if (categoryFilter) {
    categoryFilter.addEventListener('change', (e) => {
      const category = e.target.value;
      console.log('Filter by category:', category);
      // Filter products by category
    });
  }

  // Sort filter
  if (sortFilter) {
    sortFilter.addEventListener('change', (e) => {
      const sortBy = e.target.value;
      console.log('Sort by:', sortBy);
      // Sort products
    });
  }

  // Add to cart button handlers
  const addCartButtons = document.querySelectorAll('.btn-add-cart');
  addCartButtons.forEach(button => {
    button.addEventListener('click', function() {
      const productName = this.closest('.product-card').querySelector('.product-name').textContent;
      console.log('Added to cart:', productName);
      // Show notification
      this.textContent = '✓ Added';
      setTimeout(() => {
        this.textContent = 'Add to Cart';
      }, 2000);
    });
  });
});
