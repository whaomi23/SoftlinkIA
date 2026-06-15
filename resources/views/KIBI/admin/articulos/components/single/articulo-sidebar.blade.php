@props(['articulo', 'sections'])

<div class="sticky top-24 mt-8">
    <!-- Table of Contents -->
    @include('KIBI.admin.articulos.components.single.articulo-toc', ['articulo' => $articulo, 'sections' => $sections])

    <!-- Newsletter Image -->
    <div class="mb-6">
        <img src="{{ asset('images/education/image.png') }}" alt="Educación" style="border-radius: 15px;">
    </div>

</div>
