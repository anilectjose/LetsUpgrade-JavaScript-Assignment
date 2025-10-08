// Sample menu data
const menuItems = [
  { id: 1, name: "Burger", price: 5 },
  { id: 2, name: "Pizza", price: 8 },
  { id: 3, name: "Pasta", price: 7 },
  { id: 4, name: "Salad", price: 4 }
];

// Add Menu Items to index.html
const menuDiv = document.getElementById('menu');
if (menuDiv) {
  menuItems.forEach(item => {
    const div = document.createElement('div');
    div.classList.add('menu-item');
    div.innerHTML = `
      <h3>${item.name}</h3>
      <p>Price: $${item.price}</p>
      <button onclick="addToCart(${item.id})">Add to Cart</button>
    `;
    menuDiv.appendChild(div);
  });
}

// Add to Cart
function addToCart(id) {
  const item = menuItems.find(i => i.id === id);
  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  const existing = cart.find(i => i.id === id);
  if (existing) {
    existing.quantity += 1;
  } else {
    cart.push({...item, quantity: 1});
  }
  localStorage.setItem('cart', JSON.stringify(cart));
  alert(`${item.name} added to cart`);
}

// Display Cart
const cartTableBody = document.querySelector('#cartTable tbody');
if (cartTableBody) {
  const cart = JSON.parse(localStorage.getItem('cart')) || [];
  let total = 0;
  cart.forEach((item, index) => {
    total += item.price * item.quantity;
    const row = document.createElement('tr');
    row.innerHTML = `
      <td>${item.name}</td>
      <td>$${item.price}</td>
      <td>${item.quantity}</td>
      <td><button onclick="removeFromCart(${index})">Remove</button></td>
    `;
    cartTableBody.appendChild(row);
  });
  document.getElementById('total').textContent = `Total: $${total}`;
}

// Remove from Cart
function removeFromCart(index) {
  let cart = JSON.parse(localStorage.getItem('cart')) || [];
  cart.splice(index, 1);
  localStorage.setItem('cart', JSON.stringify(cart));
  location.reload();
}
