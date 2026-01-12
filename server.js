const express = require('express');
const path = require('path');
const app = express();
const PORT = process.env.PORT || 3000;

// Middleware
app.use(express.json());
app.use(express.urlencoded({ extended: true }));
app.use(express.static('public'));

// In-memory data storage (in a real app, this would be a database)
let entrepreneurs = [];
let services = [];
let resources = [];

// API Routes

// Get all entrepreneurs
app.get('/api/entrepreneurs', (req, res) => {
  res.json(entrepreneurs);
});

// Add a new entrepreneur
app.post('/api/entrepreneurs', (req, res) => {
  // Validate required fields
  if (!req.body.name || !req.body.email || !req.body.business || !req.body.description || !req.body.location) {
    return res.status(400).json({ error: 'All fields are required' });
  }
  
  const entrepreneur = {
    id: Date.now() + Math.random(), // Better ID generation
    name: req.body.name.trim(),
    email: req.body.email.trim(),
    business: req.body.business.trim(),
    description: req.body.description.trim(),
    location: req.body.location.trim(),
    createdAt: new Date()
  };
  entrepreneurs.push(entrepreneur);
  res.status(201).json(entrepreneur);
});

// Search entrepreneurs
app.get('/api/entrepreneurs/search', (req, res) => {
  const { query } = req.query;
  if (!query) {
    return res.json(entrepreneurs);
  }
  
  const searchTerm = query.toLowerCase();
  const results = entrepreneurs.filter(e => 
    (e.name && e.name.toLowerCase().includes(searchTerm)) ||
    (e.business && e.business.toLowerCase().includes(searchTerm)) ||
    (e.description && e.description.toLowerCase().includes(searchTerm)) ||
    (e.location && e.location.toLowerCase().includes(searchTerm))
  );
  res.json(results);
});

// Get all services
app.get('/api/services', (req, res) => {
  res.json(services);
});

// Add a new service
app.post('/api/services', (req, res) => {
  // Validate required fields
  if (!req.body.title || !req.body.description || !req.body.provider || !req.body.category || !req.body.contact) {
    return res.status(400).json({ error: 'All fields are required' });
  }
  
  const service = {
    id: Date.now() + Math.random(),
    title: req.body.title.trim(),
    description: req.body.description.trim(),
    provider: req.body.provider.trim(),
    category: req.body.category.trim(),
    contact: req.body.contact.trim(),
    createdAt: new Date()
  };
  services.push(service);
  res.status(201).json(service);
});

// Get all resources
app.get('/api/resources', (req, res) => {
  res.json(resources);
});

// Add a new resource
app.post('/api/resources', (req, res) => {
  // Validate required fields
  if (!req.body.title || !req.body.description || !req.body.type) {
    return res.status(400).json({ error: 'Title, description, and type are required' });
  }
  
  const resource = {
    id: Date.now() + Math.random(),
    title: req.body.title.trim(),
    description: req.body.description.trim(),
    type: req.body.type.trim(),
    url: req.body.url ? req.body.url.trim() : '',
    createdAt: new Date()
  };
  resources.push(resource);
  res.status(201).json(resource);
});

// Serve the main page
app.get('/', (req, res) => {
  res.sendFile(path.join(__dirname, 'public', 'index.html'));
});

// Start server
app.listen(PORT, () => {
  console.log(`Poduzetnici.hr server running on http://localhost:${PORT}`);
});

module.exports = app;
