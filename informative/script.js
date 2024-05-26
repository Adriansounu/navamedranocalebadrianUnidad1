document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const suggestionsList = document.getElementById('suggestionsList');

    searchInput.addEventListener('input', function() {
        const query = searchInput.value.trim();

        if (query.length > 0) {
            // Simulación de sugerencias basadas en el término de búsqueda
            const suggestions = ['Ejemplo 1', 'Ejemplo 2', 'Ejemplo 3', 'Sugerencia A', 'Sugerencia B'];
            const filteredSuggestions = suggestions.filter(suggestion =>
                suggestion.toLowerCase().includes(query.toLowerCase())
            );

            suggestionsList.innerHTML = '';

            filteredSuggestions.forEach(suggestion => {
                const li = document.createElement('li');
                li.classList.add('list-group-item');
                li.textContent = suggestion;
                li.addEventListener('click', function() {
                    searchInput.value = suggestion;
                    suggestionsList.style.display = 'none';
                });
                suggestionsList.appendChild(li);
            });

            suggestionsList.style.display = 'block';
        } else {
            suggestionsList.style.display = 'none';
        }
    });

    document.addEventListener('click', function(event) {
        if (!suggestionsList.contains(event.target) && event.target !== searchInput) {
            suggestionsList.style.display = 'none';
        }
    });
});





