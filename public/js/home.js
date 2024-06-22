// const container = document.getElementById()

// console.log('bjir');

// Ganti image
document.addEventListener('DOMContentLoaded', function() {
    var images = document.querySelectorAll('.image');
    images.forEach(function(image) {
      var imagePath = image.getAttribute('data-image');
      if (imagePath) {
        image.style.backgroundImage = 'url(' + imagePath + ')';
        image.style.backgroundSize = 'cover'; // Sesuaikan dengan kebutuhan
        image.style.backgroundPosition = 'center'; // Sesuaikan dengan kebutuhan
      }
    });
  });

// Modal
document.addEventListener('DOMContentLoaded', (event) => {
    const detailModal = document.getElementById('details-modal');
    detailModal.addEventListener('show.bs.modal', (event) => {
        const button = event.relatedTarget;

        const cornerName = detailModal.querySelector('#corner-name');
        const detail = detailModal.querySelector('#detail');
        const categories = detailModal.querySelector('#categories');
        const facilities = detailModal.querySelector('#facilities');
        const images = detailModal.querySelector('#images');
        const images_indicator = detailModal.querySelector('#images-indicator');
        const location = detailModal.querySelector('#location');

        cornerName.innerHTML = button.getAttribute('data-name');
        detail.innerHTML = button.getAttribute('data-detail');
        location.setAttribute('href', button.getAttribute('data-location'));
        

        // Bikin gambar
        const objectGambar = JSON.parse(button.getAttribute('data-images'));
        
        images.innerHTML = '';
        images_indicator.innerHTML = '';

        objectGambar.forEach((item, index) => {
            // console.log(item);
            
            const carouselItem = document.createElement('div');
            carouselItem.classList.add('carousel-item');
            if (index === 0) {
                carouselItem.classList.add('active');
            }

            const img = document.createElement('img');
            img.classList.add('d-block', 'w-100');
            img.setAttribute('src', item.path);
            img.setAttribute('alt', item.path);

            carouselItem.appendChild(img);
            images.appendChild(carouselItem);

            const indicator = document.createElement('button');
            indicator.type = 'button';
            indicator.setAttribute('data-bs-target', '#slider');
            indicator.setAttribute('data-bs-slide-to', index);
            if (index === 0) {
                indicator.classList.add('active');
                indicator.setAttribute('aria-current', 'true');
            }
            indicator.setAttribute('aria-label', 'Slide ' + (index + 1));

            images_indicator.appendChild(indicator);
        });

        // bikin kategori
        const objectKategori = JSON.parse(button.getAttribute('data-categories'));
        categories.innerHTML='';
        objectKategori.forEach(item => {
          // console.log(item);
          const list = document.createElement('li');
          list.innerHTML=item.name;
          categories.appendChild(list);
        });

        // bikin kategori
        const objectFasilitas = JSON.parse(button.getAttribute('data-facilities'));
        facilities.innerHTML='';
        objectFasilitas.forEach(item => {
          // console.log(item);
          const list = document.createElement('li');
          list.innerHTML=item.name;
          facilities.appendChild(list);
        });

        
        // harga.innerHTML= parseFloat(button.getAttribute('data-f')).toLocaleString('id-ID', {
        //     style: 'currency',
        //     currency: 'IDR',
        //     minimumFractionDigits: 2
        // });

    });
});