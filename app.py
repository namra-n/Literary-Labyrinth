from flask import Flask, render_template
import requests
app = Flask(__name__)

# Replace with your API key
API_KEY = "AIzaSyBmujRM5I1xPHQaAxamTJWWi1PvrZFJcTY"
search_term = "high fanatsy"

@app.route("/")
def recommend_books():
  # Fetch book data using the code from previous example
  books = fetch_book_data(search_term)  # Replace with your function

  # Return the HTML template with the fetched books data
  return render_template("index1.html", books=books)

def fetch_book_data(search_term):
   base_url = "https://www.googleapis.com/books/v1/volumes"
   url = f"{base_url}?q={search_term}&key={API_KEY}"
   response = requests.get(url)
   if response.status_code == 200:
    data = response.json()
    books = []
    for item in data["items"]:
      book = {}
      book["title"] = item["volumeInfo"]["title"]
      book["authors"] = item["volumeInfo"].get("authors", [])
      book["image_link"] = item["volumeInfo"].get("imageLinks", {}).get("thumbnail", "")
      books.append(book)
  
   return books  

if __name__ == "__main__":
  app.run(debug=True)

