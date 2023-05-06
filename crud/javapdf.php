function createPDF() {
  // Create a new jsPDF instance
  const doc = new jsPDF();

  // Get the table element
  const table = document.querySelector('table');

  // Convert the table to a data URL
  const data = tableToDataUrl(table);

  // Add the data URL to the PDF document
  doc.addImage(data, 'JPEG', 10, 10, 190, 0);

  // Save the PDF document
  doc.save('table.pdf');
}

function tableToDataUrl(table) {
  // Create a canvas element
  const canvas = document.createElement('canvas');

  // Get the table dimensions
  const width = table.offsetWidth;
  const height = table.offsetHeight;

  // Set the canvas dimensions
  canvas.width = width;
  canvas.height = height;

  // Draw the table on the canvas
  const ctx = canvas.getContext('2d');
  ctx.fillStyle = '#ffffff';
  ctx.fillRect(0, 0, width, height);
  const data = new XMLSerializer().serializeToString(table);
  const img = new Image();
  img.src = 'data:image/svg+xml;base64,' + btoa(data);
  ctx.drawImage(img, 0, 0);

  // Convert the canvas to a data URL
  const dataUrl = canvas.toDataURL('image/jpeg', 1.0);

  return dataUrl;
}
