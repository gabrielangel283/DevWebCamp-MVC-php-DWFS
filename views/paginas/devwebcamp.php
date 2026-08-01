<main class="devwebcamp">
    <h2 class="devwebcamp__heading"><?php echo $titulo; ?></h2>
    <p class="devwebcamp__descripcion">Conoce la conferencia mas importante de Latinoamerica</p>

    <div class="devwebcamp__grid">
        <div data-aos="<?php acs_animacion(); ?>" class="devwebcamp__imagen">
            <picture>
                <source srcset="build/img/sobre_devwebcamp.avif" type="image/avif">
                <source srcset="build/img/sobre_devwebcamp.webp" type="image/webp">
                <img loading="lazy" width="200" height="300" src="build/img/sobre_devwebcamp.jpg" alt="Imagen devwebcamp">
            </picture>
        </div>

        <div data-aos="<?php acs_animacion(); ?>" class="devwebcamp__contenido">
            <p class="devwebcamp__texto">Voluptates accusantium praesentium at quae distinctio nemo veritatis temporibus ex dolorum voluptate delectus dolores repudiandae, quos, eaque suscipit! Mollitia libero aut ab. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Obcaecati corporis incidunt, dignissimos officiis quaerat ad. Ab, earum, quae alias voluptatum exercitationem laboriosam corrupti doloremque sunt magnam eius quisquam perferendis enim.</p>
            <p class="devwebcamp__texto">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates accusantium praesentium at quae distinctio nemo veritatis temporibus ex dolorum voluptate delectus dolores repudiandae, quos, eaque suscipit! Mollitia libero aut ab.</p>
        </div>
    </div>
</main>