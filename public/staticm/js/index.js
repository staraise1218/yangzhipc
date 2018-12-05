var Index = {
  initSwiper() {
    $(".swiper-container").swiper({
      autoplay: 3000,
      autoplayDisableOnInteraction: false,
      loop: true,
      pagination: ".swiper-pagination"
    })
  },
  init() {
    Index.initSwiper()
  }
}
$(function () {
  Index.init()
})