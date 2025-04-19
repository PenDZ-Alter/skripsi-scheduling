document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.value-profile.border-bottom').forEach(el => {
        el.addEventListener('click', function () {
            if (this.querySelector('input')) return;

            const value = this.textContent.trim();
            const input = document.createElement('input');
            input.type = 'text';
            input.value = value;
            input.className = 'form-control border-0 p-0';
            this.innerHTML = '';
            this.appendChild(input);
            input.focus();
        });
    });
});
