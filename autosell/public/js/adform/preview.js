document.getElementById('fileInput').addEventListener('change', function(event) {
    const preview = document.getElementById('preview');
    preview.innerHTML = '';
    
    const files = event.target.files;
    for (let i = 0; i < files.length; i++) {
      const file = files[i];
      const reader = new FileReader();
      
      reader.onload = function(e) {
        const previewItem = document.createElement('div');
        previewItem.classList.add('col-md-6');
        const img = document.createElement('img');
        img.classList.add('preview-img');
        img.src = e.target.result;
        previewItem.appendChild(img);
        preview.appendChild(previewItem);
      }
      
      reader.readAsDataURL(file);
    }
  });