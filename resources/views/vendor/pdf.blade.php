<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        *,
        ::after,
        ::before {
            box-sizing: border-box;
            border-width: 0;
            border-style: solid;
            border-color: #e5e7eb;
        }

        *,
        ::before,
        ::after {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / 0.5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia: ;
        }

        ::after,
        ::before {
            --tw-content: '';
        }

        body {
            line-height: inherit;
        }

        .container {
            max-width: 495px
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .bg-slate-200 {
            background-color: rgb(226 232 240 / 1)
        }

        .p-4 {
            padding: 1rem;
        }

        .border-white {
            --tw-border-opacity: 1;
            border-color: rgb(255 255 255 / var(--tw-border-opacity));
        }

        .border-8 {
            border-width: 8px;
        }

        .gap-4 {
            gap: 1rem;
        }

        .auto-rows-max {
            grid-auto-rows: max-content;
        }

        .grid-flow-row {
            grid-auto-flow: row;
        }

        .grid {
            display: grid;
        }

        .bg-white {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity));
        }

        .grid-cols-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .grid-rows-3 {
            grid-template-rows: repeat(3, minmax(0, 1fr));
        }

        .col-span-2 {
            grid-column: span 2 / span 2;
        }

        .row-span-2 {
            grid-row: span 2 / span 2;
        }

        .object-cover {
            object-fit: cover;
        }

        .h-full {
            height: 100%;
        }

        img,
        video {
            max-width: 100%;
            height: auto;
        }


        .font-semibold {
            font-weight: 600;
        }

        .text-base {
            font-size: 1rem;
            line-height: 1.5rem;
        }

        .text-center {
            text-align: center;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .bg-white {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity));
        }

        .justify-center {
            justify-content: center;
        }

        .items-center {
            align-items: center;
        }

        .flex-col {
            flex-direction: column;
        }

        .flex {
            display: flex;
        }

        .font-bold {
            font-weight: 700;
        }

        blockquote,
        dd,
        dl,
        figure,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        hr,
        p,
        pre {
            margin: 0;
        }

        .font-semibold {
            font-weight: 600;
        }

        .text-base {
            font-size: 1rem;
            line-height: 1.5rem;
        }

        .text-center {
            text-align: center;
        }

        .p-12 {
            padding: 3rem;
        }

        .text-orange-500 {
            --tw-text-opacity: 1;
            color: rgb(249 115 22 / var(--tw-text-opacity));
        }

        .text-lg {
            font-size: 1.125rem;
            line-height: 1.75rem;
        }

        .mb-8 {
            margin-bottom: 2rem;
        }

        .list-disc {
            list-style-type: disc;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        .p-8 {
            padding: 2rem;
        }

        .tg {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .tg td {
            border-color: gray;
            border-style: solid;
            border-width: 2px;
            border-left-width: 0;
            border-top-width: 2px;
            border-bottom-width: 2px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            overflow: auto;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg th {
            border-color: gray;
            border-style: solid;
            border-left-width: 0;
            border-top-width: 2px;
            border-bottom-width: 2px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            overflow: auto;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg .tg-0lax {
            text-align: left;
            vertical-align: top
        }

        .page-break {
            page-break-after: always;
        }



        @media screen and (max-width: 767px) {
            .tg {
                width: auto !important;
            }

            .tg col {
                width: auto !important;
            }

            .tg-wrap {
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

        }
    </style>
</head>

<body class="print-block">
    <main class="container mx-auto">
        <div class="tg-wrap">

            <table class="tg">
                <tbody>
                    <tr>
                        <td class="tg-0pky" colspan="8">
                            <section>
                                <div class="bg-white p-4">
                                    <h1 class="font-bold text-xl">TICKET TYPE: Prelase 1 (HET Rp. 30.000,-)</h1>
                                    <h1 class="font-bold text-xl">UKM EXPO 2022</h1>
                                </div>
                            </section>
                        </td>
                    </tr>
                    <tr>
                        <td class="tg-0pky" colspan="8">
                            <div class="row-span-2">
                                <img src="https://media.istockphoto.com/photos/background-of-galaxy-and-stars-picture-id1035676256?b=1&k=20&m=1035676256&s=170667a&w=0&h=NOtiiFfDhhUhZgQ4wZmHPXxHvt3RFVD-lTmnWCeyIG4="
                                    class="object-cover" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="tg-0pky" colspan="4">
                            <div class="row-span-2">
                                <img src="https://media.istockphoto.com/photos/background-of-galaxy-and-stars-picture-id1035676256?b=1&k=20&m=1035676256&s=170667a&w=0&h=NOtiiFfDhhUhZgQ4wZmHPXxHvt3RFVD-lTmnWCeyIG4="
                                    class="object-cover" />
                            </div>
                        </td>
                        <td class="tg-0pky" colspan="4">
                            <div class="bg-white p-4">
                                <img src="{{ $barcode }}" class="object-cover" />
                                <p class="text-base text-center font-semibold">{{ $uniqueId }}</p>
                                <p class="text-base text-center font-semibold">Ticket 1 of 1</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="tg-0pky" colspan="4">
                            <div
                                class="text-center font-semibold text-base bg-white px-4 justify-center items-center flex flex-col">
                                <h2 class="font-bold">UKM EXPO 2022</h2>
                                <h3>25 - 26 Agustus 2022</h3>
                                <p>
                                    Jl. Teknik Kimia, Keputih, Kec. Sukolilo, Kota SBY, Jawa Timur
                                    60111
                                </p>
                                <p>Loket UKM Expo</p>
                            </div>
                        </td>
                        <td class="tg-0pky" colspan="4">
                            <div class="bg-white text-center flex flex-col px-4 justify-center items-center text-base">
                                <div class="font-bold">
                                    <p>{{ $password }}</p>
                                    <p>{{ $name }}</p>
                                </div>
                                <p>Ordered on </p>
                                <p>Ref: Online</p>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="tg-0pky" colspan="8" rowspan="2">
                            <section class="bg-white p-12">
                                <h2 class="text-center text-orange-500 font-bold text-base mb-8 text-lg">TERMS &
                                    CONDITION</h2>
                                <h3 class="font-bold text-lg mb-3 text-lg uppercase">Regulasi Tiket</h3>
                                <ul class="list-disc p-4 text-base mb-4">
                                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore laboriosam
                                        fugiat alias, minus
                                        nisi, delectus recusandae deleniti quas nostrum perferendis voluptatibus
                                        exercitationem incidunt
                                        asperiores eius! Aperiam voluptatem numquam cupiditate harum.</li>
                                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore laboriosam
                                        fugiat alias, minus
                                        nisi, delectus recusandae deleniti quas nostrum perferendis voluptatibus
                                        exercitationem incidunt
                                        asperiores eius! Aperiam voluptatem numquam cupiditate harum.</li>
                                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore laboriosam
                                        fugiat alias, minus
                                        nisi, delectus recusandae deleniti quas nostrum perferendis voluptatibus
                                        exercitationem incidunt
                                        asperiores eius! Aperiam voluptatem numquam cupiditate harum.</li>
                                    <li class="page-break">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        Tempore laboriosam
                                        fugiat alias, minus
                                        nisi, delectus recusandae deleniti quas nostrum perferendis voluptatibus
                                        exercitationem incidunt
                                        asperiores eius! Aperiam voluptatem numquam cupiditate harum.</li>
                                </ul>
                                <h3 class="font-bold mb-3 text-lg uppercase">Regulasi Pengunjung</h3>
                                <ul class="list-disc p-4 text-base mb-4">
                                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore laboriosam
                                        fugiat alias, minus
                                        nisi, delectus recusandae deleniti quas nostrum perferendis voluptatibus
                                        exercitationem incidunt
                                        asperiores eius! Aperiam voluptatem numquam cupiditate harum.</li>
                                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore laboriosam
                                        fugiat alias, minus
                                        nisi, delectus recusandae deleniti quas nostrum perferendis voluptatibus
                                        exercitationem incidunt
                                        asperiores eius! Aperiam voluptatem numquam cupiditate harum.</li>
                                    <li class="page-break">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                        Tempore laboriosam
                                        fugiat alias, minus
                                        nisi, delectus recusandae deleniti quas nostrum perferendis voluptatibus
                                        exercitationem incidunt
                                        asperiores eius! Aperiam voluptatem numquam cupiditate harum.</li>
                                </ul>
                                <h3 class="font-bold mb-3 text-lg uppercase">Protokol Kesehatan Yang Berlaku
                                </h3>
                                <ul class="list-disc p-4 text-base mb-4">
                                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore laboriosam
                                        fugiat alias, minus
                                        nisi, delectus recusandae deleniti quas nostrum perferendis voluptatibus
                                        exercitationem incidunt
                                        asperiores eius! Aperiam voluptatem numquam cupiditate harum.</li>
                                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore laboriosam
                                        fugiat alias, minus
                                        nisi, delectus recusandae deleniti quas nostrum perferendis voluptatibus
                                        exercitationem incidunt
                                        asperiores eius! Aperiam voluptatem numquam cupiditate harum.</li>
                                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore laboriosam
                                        fugiat alias, minus
                                        nisi, delectus recusandae deleniti quas nostrum perferendis voluptatibus
                                        exercitationem incidunt
                                        asperiores eius! Aperiam voluptatem numquam cupiditate harum.</li>
                                </ul>
                                <h3 class="font-bold mb-3 text-lg uppercase">Prohibited Items</h3>
                                <ul class="list-disc p-4 text-base mb-4">
                                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore laboriosam
                                        fugiat alias, minus
                                        nisi, delectus recusandae deleniti quas nostrum perferendis voluptatibus
                                        exercitationem incidunt
                                        asperiores eius! Aperiam voluptatem numquam cupiditate harum.</li>
                                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore laboriosam
                                        fugiat alias, minus
                                        nisi, delectus recusandae deleniti quas nostrum perferendis voluptatibus
                                        exercitationem incidunt
                                        asperiores eius! Aperiam voluptatem numquam cupiditate harum.</li>
                                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore laboriosam
                                        fugiat alias, minus
                                        nisi, delectus recusandae deleniti quas nostrum perferendis voluptatibus
                                        exercitationem incidunt
                                        asperiores eius! Aperiam voluptatem numquam cupiditate harum.</li>
                                </ul>

                            </section>
                        </td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                        <td class="tg-0pky" colspan="4">
                            <div class="bg-white p-4 text-center">
                                <a href="https://ukmexpoits.com/"
                                    class="font-bold hover:underline text-blue-500 text-base">www.ukmexpoits.com</a>
                            </div>
                        </td>
                        <td class="tg-0pky" style="border-right-width: 0!important" colspan="4">
                            <div class="bg-white p-4 text-center flex justify-center">
                                <a href="tel:6281234567890"
                                    class="font-bold hover:underline text-blue-500 text-base flex"><img
                                        src="https://img.icons8.com/ios-glyphs/30/000000/phone--v1.png"
                                        class="pr-4" />+62-812-3456-7890</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="tg-0pky" style="border-right-width: 0!important" colspan="8">
                            <section>
                                <div class="bg-white">
                                    <h4 class="text-center font-bold p-8">Powered by UKM EXPO ITS 2022</h4>
                                </div>
                            </section>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>
