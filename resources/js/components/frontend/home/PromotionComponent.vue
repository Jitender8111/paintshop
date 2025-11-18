<template>
  <LoadingComponent :props="loading" />

  <section v-if="promotions.length > 0" class="mb-10 sm:mb-20">
    <div class="container">
      <Swiper
        ref="promoSwiper"
        dir="ltr"
        :speed="1000"
        :loop="true"
        :autoplay="{ delay: 2500, disableOnInteraction: false }"
        :breakpoints="breakpoints"
        :modules="modules"
        class="ad-swiper"
      >
        <SwiperSlide v-for="promotion in promotions" :key="promotion.id" class="mobile:!w-52">
          <router-link
            :to="{ name: 'frontend.promotion.products', params: { slug: promotion.slug } }"
            class="w-full"
          >
            <img class="w-full block rounded-2xl" :src="promotion.cover" alt="promotion" />
          </router-link>
        </SwiperSlide>
      </Swiper>
    </div>
  </section>
</template>

<script>
import "swiper/css";
import "swiper/css/autoplay";
import { Swiper, SwiperSlide } from "swiper/vue";
import { Autoplay } from "swiper/modules";
import statusEnum from "../../../enums/modules/statusEnum";
import promotionTypeEnum from "../../../enums/modules/promotionTypeEnum";
import LoadingComponent from "../components/LoadingComponent";

export default {
  name: "PromotionComponent",
  components: { Swiper, SwiperSlide, LoadingComponent },
  setup() {
    return { modules: [Autoplay] };
  },
  data() {
    return {
      loading: { isActive: false },
      breakpoints: {
        0: { slidesPerView: "auto", spaceBetween: 10 },
        640: { slidesPerView: 3, spaceBetween: 10 },
      },
    };
  },
  computed: {
    promotions() {
      return this.$store.getters["frontendPromotion/lists"];
    },
  },
  mounted() {
    this.loading.isActive = true;
    this.$store
      .dispatch("frontendPromotion/lists", {
        paginate: 0,
        order_column: "id",
        order_type: "asc",
        type: promotionTypeEnum.SMALL,
        status: statusEnum.ACTIVE,
      })
      .finally(() => {
        this.loading.isActive = false;
        this.$nextTick(() => {
          const swiper = this.$refs.promoSwiper?.swiper;
          swiper?.autoplay?.start();
        });
      });
  },
};
</script>
