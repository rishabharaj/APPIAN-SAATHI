document.getElementById('profileForm').addEventListener('submit', function (event) {
    event.preventDefault();
  
    // Collect form data
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const contact = document.getElementById('contact').value;
    const documents = document.getElementById('documents').files;
  
    // Display collected data
    const output = document.getElementById('output');
    output.style.display = 'block';
    output.innerHTML = `
      <h3>Profile Details Submitted</h3>
      <p><strong>Name:</strong> ${name}</p>
      <p><strong>Email:</strong> ${email}</p>
      <p><strong>Contact:</strong> ${contact}</p>
      <p><strong>Uploaded Documents:</strong></p>
      <ul>
        ${Array.from(documents)
          .map(file => <li>${file.name} (${(file.size / 1024).toFixed(2)} KB)</li>)
          .join('')}
      </ul>
    `;
  
    // Optional: Send the data to the backend via AJAX or Fetch API
    console.log({
      name,
      email,
      contact,
      documents: Array.from(documents),
    });
  });