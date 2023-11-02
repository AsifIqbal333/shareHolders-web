<x-website-layout>
    <!-- Hero Start -->
    <x-website.homepage.hero />
    <!-- Hero End -->

    <!-- Start -->
    <section class="relative lg:py-24 py-16">
        <!-- About -->
        <x-website.homepage.about />

        <!-- How It Works -->
        <x-website.homepage.works />

        <!-- Properties -->
        <x-website.properties :properties="$properties" />
    </section>
    <!--end section-->

    <!-- Start CTA -->
    <x-website.homepage.cta />
    <!-- End CTA -->

    <!-- Business Partner -->
    <x-website.partners />
    <!-- Business Partner End -->

    <!-- Testimonial Start -->
    <x-website.testimonials :testimonials="$testimonials" />
    <!-- Testimonial End -->

</x-website-layout>
