document.querySelectorAll('.edit-btn').forEach(button => {
    button.addEventListener('click', function() {
        const id = this.getAttribute('data-id');
        const name = this.getAttribute('data-name');
        const category = this.getAttribute('data-category');
        const sum = this.getAttribute('data-sum');
        const date = this.getAttribute('data-date');

        document.getElementById('expenseId').value = id;
        document.getElementById('expenseName').value = name;
        document.getElementById('expenseCategory').value = category;
        document.getElementById('expenseSum').value = sum;
        document.getElementById('expenseDate').value = date;

        document.getElementById('editModal').style.display = 'block';
    });
});

document.querySelector('.close').addEventListener('click', function() {
    document.getElementById('editModal').style.display = 'none';
});

window.addEventListener('click', function(event) {
    const modal = document.getElementById('editModal');
    if (event.target === modal) {
        modal.style.display = 'none';
    }
});

