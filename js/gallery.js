export default function() {
    const galleryPage = document.querySelector('.page-id-27');
    if(!galleryPage) return;

    const photos = document.querySelectorAll('.sbi_photo');
    photos.forEach(photo => {
        photo.addEventListener('click', e => {
            e.preventDefault();
        })
    });
}