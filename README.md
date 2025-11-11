Hotel Booking Management System:
This version runs entirely on HTML, CSS, and JavaScript — no Flask, Python, or database server needed.
It uses the browser’s LocalStorage or JSON files to simulate a backend database.

⚙️ Overview
A hotel room booking website where:
Users can view rooms, check availability, book a room, and see confirmation.
Admins can manage rooms, bookings, and staff via a simple admin panel.
All data (rooms, users, bookings, payments) are stored locally in the browser (LocalStorage) — perfect for demo or educational projects.


🗂️ Project Structure:-

HotelBookingSystem/
├── index.html            # Home page (available rooms)
├── book.html             # Room booking form
├── confirmation.html     # Booking confirmation
├── login.html            # Admin login
├── admin-dashboard.html  # Admin control panel
│
├── css/
│   └── style.css         # Stylesheet
│
├── js/
│   ├── main.js           # Main JS logic (frontend + booking)

Booking Flow:-

User visits index.html → selects dates → clicks “Book Now”.
Redirects to book.html with room details.

🔒 Security Notes

Client-side data validation for all form inputs (to prevent invalid data entry).
-> LocalStorage simulation used instead of an exposed backend database.
-> Admin login protected with simple password-based authentication (stored locally).
-> Session-based access for admin panel using JavaScript session flags.


🚀 Future Enhancements

📧 Email Notifications for booking confirmation
🔍 Advanced Search and Filters for room types and pricing
🧑‍💼 Customer Account Management (login and booking history)
❌ Booking Cancellation and Refund Simulation
📊 Reports and Analytics Dashboard

📜 License:-

This project is open source and created for educational and learning purposes.
You are free to modify, distribute, and improve it for personal or academic use.

🧩 Support:-
If you have and issues or suggestions:
Review the code comments inside the JavaScript files (main.js, admin.js, etc.)
Or create an issue or feedback thread in the repository or project discussion section.
