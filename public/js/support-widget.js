document.addEventListener('DOMContentLoaded', function() {
    const widget = document.getElementById('support-widget');
    const toggle = widget.querySelector('.support-widget__toggle');
    const panel = widget.querySelector('.support-widget__panel');
    const form = document.getElementById('support-form');

    // Toggle widget visibility
    toggle.addEventListener('click', () => {
        const isActive = panel.classList.toggle('active');
        toggle.classList.toggle('active', isActive);
    });

    // Handle form submission
    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(form);

        try {
            const response = await fetch('/support-message', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(Object.fromEntries(formData))
            });

            if (response.ok) {
                alert('Mensaje enviado correctamente');
                form.reset();
                panel.classList.remove('active');
                panel.style.opacity = '0';
                panel.style.transform = 'translateY(-20px)';
                setTimeout(() => {
                    panel.style.opacity = '1';
                    panel.style.transform = 'translateY(0)';
                }, 500);
            } else {
                throw new Error('Error en el envío');
            }
        } catch (error) {
            console.error(error);
            alert('Error al enviar el mensaje');
        }
    });
});