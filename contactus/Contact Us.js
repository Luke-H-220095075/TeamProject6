document.addEventListener('DOMContentLoaded', function () {

  const form = document.getElementById('contact-form');

  form.addEventListener('submit', function (event) {
    event.preventDefault();

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const confirmEmail = document.getElementById('confirm-email').value;
    const startDate = new Date(document.getElementById('start-date').value);
    const duration = parseInt(document.getElementById('duration').value);
    const contactMethod = document.querySelector('input[name="contact-method"]:checked').value;
    const description = document.getElementById('description').value;

    const currentDate = new Date();
    const oneDay = 24 * 60 * 60 * 1000;
    if (startDate.getTime() < currentDate.getTime() + oneDay) {
      alert('The proposed start date must be at least 1 day in the future.');
      return;
    }

    if (email !== confirmEmail) {
      alert('The email and confirm email fields must match.');
      return;
    }

    const formData = {
      name: name,
      email: email,
      startDate: startDate.toDateString(),
      duration: duration,
      contactMethod: contactMethod,
      description: description
    };

    const popUpContent = `
        <p><strong>Name:</strong> ${formData.name}</p>
        <p><strong>Email:</strong> ${formData.email}</p>
        <p><strong>Proposed Start Date:</strong> ${formData.startDate}</p>
        <p><strong>Duration:</strong> ${formData.duration} days</p>
        <p><strong>Preferred Method of Contact:</strong> ${formData.contactMethod}</p>
        <p><strong>Project Description:</strong> ${formData.description}</p>
      `;
    const popUp = window.open('', 'Contact Form Summary', 'width=600,height=400');
    popUp.document.body.innerHTML = popUpContent;

  });
});