document.getElementById('contactForm').addEventListener('submit', async function(e) {
  e.preventDefault();
  const msg = document.getElementById('responseMsg');
  msg.textContent = 'Sending...';
  msg.className = '';

  const data = new FormData();
  data.append('name', document.getElementById('name').value.trim());
  data.append('email', document.getElementById('email').value.trim());
  data.append('message', document.getElementById('message').value.trim());

  try {
    const res = await fetch('submit.php', { method: 'POST', body: data });
    const json = await res.json();
    msg.textContent = json.message;
    msg.className = json.success ? 'success' : 'error';
    if (json.success) this.reset();
  } catch (err) {
    msg.textContent = 'Something went wrong. Try again.';
    msg.className = 'error';
  }
});
