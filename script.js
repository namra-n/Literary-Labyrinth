function showAll() {
    var books = document.querySelectorAll('.book');
    books.forEach(function(book) {
        book.style.display = 'flex';
    });
}

function showFiction() {
    var books = document.querySelectorAll('.book');
    books.forEach(function(book) {
        if (book.classList.contains('fiction')) {
            book.style.display = 'flex';
        } else {
            book.style.display = 'none';
        }
    });
}

function showNonFiction() {
    var books = document.querySelectorAll('.book');
    books.forEach(function(book) {
        if (book.classList.contains('non-fiction')) {
            book.style.display = 'flex';
        } else {
            book.style.display = 'none';
        }
    });
}
function searchBooks() {
var input, filter, container, books, titles, i, title;
input = document.getElementById('searchInput');
filter = input.value.toUpperCase();
container = document.querySelector('.container');
books = container.querySelectorAll('.book');
for (i = 0; i < books.length; i++) {
    title = books[i].getElementsByTagName("h2")[0];
    if (title.innerHTML.toUpperCase().indexOf(filter) > -1) {
        books[i].style.display = "";
    } else {
        books[i].style.display = "none";
    }
}
}
function toggleDescription(book) {
    var description = book.querySelector('.book-description');
    if (description.style.display === 'block') {
        description.style.display = 'none';
    } else {
        var allDescriptions = document.querySelectorAll('.book-description');
        allDescriptions.forEach(function(desc) {
            desc.style.display = 'none';
        });
        
        description.style.display = 'block';
    }
}

function searchBooks() {
  
    var query = document.getElementById('searchInput').value.trim();
    var goodreadsURL = 'https://www.goodreads.com/search?q=' + encodeURIComponent(query);


    window.location.href = goodreadsURL;
}

function redirectToSignUp() {
    window.location.href = "login.html";
}

function redirectToRecommend() {
    window.location.href = "recommend.html";
}