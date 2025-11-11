document.getElementById('bookingForm')?.addEventListener('submit', function(e) {
  e.preventDefault();
  
  // Get form data
  const formData = new FormData();
  formData.append('name', document.getElementById('name').value);
  formData.append('email', document.getElementById('email').value);
  formData.append('room_type', document.getElementById('roomType').value);
  formData.append('check_in', document.getElementById('checkIn').value);
  formData.append('check_out', document.getElementById('checkOut').value);

  // Send data to PHP server
  fetch('book.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.text())
  .then(data => {
    // Display the response from PHP
    document.body.innerHTML = data;
  })
  .catch(error => {
    console.error('Error:', error);
    alert('❌ Booking failed. Please try again.');
  });
});document.getElementById('bookingForm')?.addEventListener('submit', function(e) {
  e.preventDefault();
  
  // Get form data
  const formData = new FormData();
  formData.append('name', document.getElementById('name').value);
  formData.append('email', document.getElementById('email').value);
  formData.append('room_type', document.getElementById('roomType').value);
  formData.append('check_in', document.getElementById('checkIn').value);
  formData.append('check_out', document.getElementById('checkOut').value);

  // Send data to PHP server
  fetch('book.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.text())
  .then(data => {
    // Display the response from PHP
    document.body.innerHTML = data;
  })
  .catch(error => {
    console.error('Error:', error);
    alert('❌ Booking failed. Please try again.');
  });
});