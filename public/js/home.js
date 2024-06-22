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
        const hari = detailModal.querySelector('#hari');
        const jamBukaTutup = detailModal.querySelector('#jam-buka-tutup');
        const harga = detailModal.querySelector('#harga');

        cornerName.innerHTML = button.getAttribute('data-name');
        detail.innerHTML = button.getAttribute('data-detail');
        location.setAttribute('href', button.getAttribute('data-location'));

        // Bikin gambar
        const objectGambar = JSON.parse(button.getAttribute('data-images'));

        images.innerHTML = '';
        images_indicator.innerHTML = '';

        objectGambar.forEach((item, index) => {
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

        // Bikin kategori
        const objectKategori = JSON.parse(button.getAttribute('data-categories'));
        categories.innerHTML = '';
        objectKategori.forEach(item => {
            const list = document.createElement('li');
            list.innerHTML = item.name;
            categories.appendChild(list);
        });

        // Bikin fasilitas
        const objectFasilitas = JSON.parse(button.getAttribute('data-facilities'));
        facilities.innerHTML = '';
        objectFasilitas.forEach(item => {
            const list = document.createElement('li');
            list.innerHTML = item.name;
            facilities.appendChild(list);
        });

        // Tampilkan hari buka
        const objectHari = JSON.parse(button.getAttribute('data-buka'));
        const urutanHari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        hari.innerHTML = '';
        urutanHari.forEach((namaHari, index) => {
            const element = document.createElement('span');
            element.textContent = namaHari;
            if (index < urutanHari.length - 1) {
                element.textContent += ', ';
            }
            if (objectHari.includes(namaHari)) {
                element.style.color = 'red';
            }
            hari.appendChild(element);
        });

        // Tampilkan jam buka-tutup
        jamBukaTutup.innerHTML = '';
        jamBukaTutup.textContent = `Jam buka: ${button.getAttribute('data-jam-buka')} - Jam tutup: ${button.getAttribute('data-jam-tutup')}`;

        // Tampilkan rentang harga
        harga.innerHTML = '';
        harga.textContent = `Rp${parseFloat(button.getAttribute('data-harga-min')).toLocaleString('id-ID')} - Rp${parseFloat(button.getAttribute('data-harga-max')).toLocaleString('id-ID')}`;
    });
});
