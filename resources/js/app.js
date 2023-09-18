import "./bootstrap";

import Alpine from "alpinejs";

import Swiper from "swiper";
import { Navigation, Pagination } from "swiper/modules";

Swiper.use([Navigation, Pagination]);

window.Alpine = Alpine;

Alpine.start();
