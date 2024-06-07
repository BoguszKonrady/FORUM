document.getElementById('custom-button').addEventListener('mouseenter', function() {
    this.style.backgroundColor = '#007bff'; // Niebieski kolor tła podczas najechania
    this.style.borderColor = '#0056b3'; // Jasny niebieski kolor obramowania podczas najechania
    this.style.color = '#fff'; // Biały kolor tekstu podczas najechania
});

document.getElementById('custom-button').addEventListener('mouseleave', function() {
    this.style.backgroundColor = '#f8f9fa'; // Brudniejszy biały kolor tła po opuszczeniu
    this.style.borderColor = '#ddd'; // Brudniejszy kolor obramowania po opuszczeniu
    this.style.color = '#333'; // Kolor tekstu po opuszczeniu
});