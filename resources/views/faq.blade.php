@extends('layouts.frontend')

@section('title', 'Frequently Asked Questions — Builderstreat')

@section('content')
<section class="section wrap" id="faq">
    <div class="section-head">
        <div class="eyebrow">FAQ</div>
        <h2>Frequently Asked Questions</h2>
    </div>

    <div class="accordion" id="builderstreatWasteFaq">
        <div class="accordion-item">
            <h2 class="accordion-header" id="wasteFaqHeadingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#wasteFaqOne" aria-expanded="true" aria-controls="wasteFaqOne">
                    1. What is Construction and Demolition Waste?
                </button>
            </h2>
            <div id="wasteFaqOne" class="accordion-collapse collapse show" aria-labelledby="wasteFaqHeadingOne" data-bs-parent="#builderstreatWasteFaq">
                <div class="accordion-body">
                    <p>Construction and demolition (C&amp;D) waste is generated from construction, renovation, repair, and demolition of houses, large building structures, roads, bridges, piers, and dams. C&amp;D waste is made up of wood, steel, concrete, gypsum, masonry, plaster, metal, and asphalt. C&amp;D waste is notable because it can contain hazardous materials such as asbestos and lead. Estimates vary, but a commonly accepted estimate is that between 15% and 20% of municipal solid waste comes from construction and demolition projects.</p>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="wasteFaqHeadingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#wasteFaqTwo" aria-expanded="false" aria-controls="wasteFaqTwo">
                    2. What are type of waste, legal classification and examples?
                </button>
            </h2>
            <div id="wasteFaqTwo" class="accordion-collapse collapse" aria-labelledby="wasteFaqHeadingTwo" data-bs-parent="#builderstreatWasteFaq">
                <div class="accordion-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col" width="25%">Type of Waste</th>
                                    <th scope="col" width="35%">Legal Classification<br>In Connecticut</th>
                                    <th scope="col" width="40%">Examples</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Landclearing debris</td>
                                    <td>Bulky waste</td>
                                    <td>Tree stumps, tree tops</td>
                                </tr>
                                <tr>
                                    <td>Demolition waste (from buildings)</td>
                                    <td>Bulky waste</td>
                                    <td>Concrete, wood, brick, plaster, roofing materials, wallboard, metals, carpeting, insulation</td>
                                </tr>
                                <tr>
                                    <td>Construction waste (from buildings)</td>
                                    <td>Municipal solid waste</td>
                                    <td>Pallets, wood scraps, wallboard, siding and roofing scraps, packaging, carpeting. Foam padding, insulation</td>
                                </tr>
                                <tr>
                                    <td>Highway construction and demolition waste</td>
                                    <td>Bulky waste, municipal solid waste</td>
                                    <td>Asphalt, concrete, steel, related construction and demolition wastes, utility poles, railroad ties, brick, block, rock</td>
                                </tr>
                                <tr>
                                    <td>Oversized MSW</td>
                                    <td>Municipal Solid Waste</td>
                                    <td>Furniture, furnishings, carpeting, rugs</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header" id="wasteFaqHeadingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#wasteFaqThree" aria-expanded="false" aria-controls="wasteFaqThree">
                    3. Why Recycle C&amp;D waste?
                </button>
            </h2>
            <div id="wasteFaqThree" class="accordion-collapse collapse" aria-labelledby="wasteFaqHeadingThree" data-bs-parent="#builderstreatWasteFaq">
                <div class="accordion-body">
                    <p>Recycling construction and demolition (C&amp;D) waste is beneficial for the environment and the construction industry. It conserves natural resources, reduces waste sent to landfills, and saves energy and carbon emissions. By recycling C&amp;D waste, we can minimize the need for new raw materials, alleviate strain on landfill capacity, and contribute to mitigating climate change. Moreover, recycling can lead to cost savings, job creation, and improved environmental image for businesses. Overall, recycling C&amp;D waste promotes sustainability, reduces environmental impact, and contributes to a more circular and efficient construction industry.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
