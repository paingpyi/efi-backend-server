<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\blog;
use App\Models\CSR;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Page;
use App\Models\News;
use App\Models\Job;
use Carbon\Carbon;

class SampleController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function result()
    {
        return view('admin.page.add-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $collection = collect([1, 2, 3, 4, 5]);
        $product_info = [
            [
                'Comprehensive motor insurance',
                '/storage/uploads/demo/general/motorcycle.svg',
                '/storage/uploads/demo/general-cover.jpg',
                4,
                '/storage/uploads/demo/moving-in.jpg',
                '/storage/uploads/demo/ratings-efi-l.svg',
                '/storage/uploads/demo/product-details/general/tick.png',
                '<p>We are a financially sound and strong company backed by Excellent Fortune Development Group, a top multi-sector conglomerate in Myanmar.</p>',
                '/storage/uploads/demo/product-details/general/plus.png',
                '<p>We listen to your feedback and will to respond to your concerns in a fair and timely manner.</p>
                <p>We process claims in a fair and timely manner.</p>
                <p>Our life advisors and life agents follow a strict code of conduct and best practices.</p>',
                '/storage/uploads/demo/product-details/general/better-life.png',
                '<p>We are committed to create a positive social impact through our products and services and to empower the people of Myanmar to live a better life.</p>',
                '/storage/uploads/demo/product-details/general/face.png',
                '<p>We believe in being honest and transparent with our customers and recommending solutions based on our customers’ needs.</p>
                <p>We are making insurance available to all segments of society.</p>',
                '/storage/uploads/demo/product-details/general/money.png',
                '<p>We aim to serve our customers with professionalism and integrity, guide by strong moral values.</p>
                <p>We provide comprehensive explanation on the solutions based on your needs, so that you can understand their features, benefits, and risks, terms and conditions, and your commitment - before you make your purchase decision.</p>',
            ],
            [
                'Fire insurance',
                '/storage/uploads/demo/general/home-insurance.svg',
                '/storage/uploads/demo/general-cover.jpg',
                4,
                '/storage/uploads/demo/moving-in.jpg',
                '/storage/uploads/demo/ratings-efi-l.svg',
                '/storage/uploads/demo/product-details/general/tick.png',
                '<p>We are a financially sound and strong company backed by Excellent Fortune Development Group, a top multi-sector conglomerate in Myanmar.</p>',
                '/storage/uploads/demo/product-details/general/plus.png',
                '<p>We listen to your feedback and will to respond to your concerns in a fair and timely manner.</p>
                <p>We process claims in a fair and timely manner.</p>
                <p>Our life advisors and life agents follow a strict code of conduct and best practices.</p>',
                '/storage/uploads/demo/product-details/general/better-life.png',
                '<p>We are committed to create a positive social impact through our products and services and to empower the people of Myanmar to live a better life.</p>',
                '/storage/uploads/demo/product-details/general/face.png',
                '<p>We believe in being honest and transparent with our customers and recommending solutions based on our customers’ needs.</p>
                <p>We are making insurance available to all segments of society.</p>',
                '/storage/uploads/demo/product-details/general/money.png',
                '<p>We aim to serve our customers with professionalism and integrity, guide by strong moral values.</p>
                <p>We provide comprehensive explanation on the solutions based on your needs, so that you can understand their features, benefits, and risks, terms and conditions, and your commitment - before you make your purchase decision.</p>'
            ],
            [
                'Marine cargo insurance',
                '/storage/uploads/demo/general/cargo-ship-3.svg',
                '/storage/uploads/demo/general-cover.jpg',
                4,
                '/storage/uploads/demo/moving-in.jpg',
                '/storage/uploads/demo/ratings-efi-l.svg',
                '/storage/uploads/demo/product-details/general/tick.png',
                '<p>We are a financially sound and strong company backed by Excellent Fortune Development Group, a top multi-sector conglomerate in Myanmar.</p>',
                '/storage/uploads/demo/product-details/general/plus.png',
                '<p>We listen to your feedback and will to respond to your concerns in a fair and timely manner.</p>
                <p>We process claims in a fair and timely manner.</p>
                <p>Our life advisors and life agents follow a strict code of conduct and best practices.</p>',
                '/storage/uploads/demo/product-details/general/better-life.png',
                '<p>We are committed to create a positive social impact through our products and services and to empower the people of Myanmar to live a better life.</p>',
                '/storage/uploads/demo/product-details/general/face.png',
                '<p>We believe in being honest and transparent with our customers and recommending solutions based on our customers’ needs.</p>
                <p>We are making insurance available to all segments of society.</p>',
                '/storage/uploads/demo/product-details/general/money.png',
                '<p>We aim to serve our customers with professionalism and integrity, guide by strong moral values.</p>
                <p>We provide comprehensive explanation on the solutions based on your needs, so that you can understand their features, benefits, and risks, terms and conditions, and your commitment - before you make your purchase decision.</p>'
            ],
            [
                'Oversea marine cargo insurance',
                '/storage/uploads/demo/general/cargo-ship-1.svg',
                '/storage/uploads/demo/general-cover.jpg',
                4,
                '/storage/uploads/demo/moving-in.jpg',
                '/storage/uploads/demo/ratings-efi-l.svg',
                '/storage/uploads/demo/product-details/general/tick.png',
                '<p>We are a financially sound and strong company backed by Excellent Fortune Development Group, a top multi-sector conglomerate in Myanmar.</p>',
                '/storage/uploads/demo/product-details/general/plus.png',
                '<p>We listen to your feedback and will to respond to your concerns in a fair and timely manner.</p>
                <p>We process claims in a fair and timely manner.</p>
                <p>Our life advisors and life agents follow a strict code of conduct and best practices.</p>',
                '/storage/uploads/demo/product-details/general/better-life.png',
                '<p>We are committed to create a positive social impact through our products and services and to empower the people of Myanmar to live a better life.</p>',
                '/storage/uploads/demo/product-details/general/face.png',
                '<p>We believe in being honest and transparent with our customers and recommending solutions based on our customers’ needs.</p>
                <p>We are making insurance available to all segments of society.</p>',
                '/storage/uploads/demo/product-details/general/money.png',
                '<p>We aim to serve our customers with professionalism and integrity, guide by strong moral values.</p>
                <p>We provide comprehensive explanation on the solutions based on your needs, so that you can understand their features, benefits, and risks, terms and conditions, and your commitment - before you make your purchase decision.</p>'
            ],
            [
                'Marine hull insurance',
                '/storage/uploads/demo/general/cargo-ship-2.svg',
                '/storage/uploads/demo/general-cover.jpg',
                4,
                '/storage/uploads/demo/moving-in.jpg',
                '/storage/uploads/demo/ratings-efi-l.svg',
                '/storage/uploads/demo/product-details/general/tick.png',
                '<p>We are a financially sound and strong company backed by Excellent Fortune Development Group, a top multi-sector conglomerate in Myanmar.</p>',
                '/storage/uploads/demo/product-details/general/plus.png',
                '<p>We listen to your feedback and will to respond to your concerns in a fair and timely manner.</p>
                <p>We process claims in a fair and timely manner.</p>
                <p>Our life advisors and life agents follow a strict code of conduct and best practices.</p>',
                '/storage/uploads/demo/product-details/general/better-life.png',
                '<p>We are committed to create a positive social impact through our products and services and to empower the people of Myanmar to live a better life.</p>',
                '/storage/uploads/demo/product-details/general/face.png',
                '<p>We believe in being honest and transparent with our customers and recommending solutions based on our customers’ needs.</p>
                <p>We are making insurance available to all segments of society.</p>',
                '/storage/uploads/demo/product-details/general/money.png',
                '<p>We aim to serve our customers with professionalism and integrity, guide by strong moral values.</p>
                <p>We provide comprehensive explanation on the solutions based on your needs, so that you can understand their features, benefits, and risks, terms and conditions, and your commitment - before you make your purchase decision.</p>'
            ],
            [
                'Cash in safe insurance',
                '/storage/uploads/demo/general/insurance.svg',
                '/storage/uploads/demo/general-cover.jpg',
                4,
                '/storage/uploads/demo/moving-in.jpg',
                '/storage/uploads/demo/ratings-efi-l.svg',
                '/storage/uploads/demo/product-details/general/tick.png',
                '<p>We are a financially sound and strong company backed by Excellent Fortune Development Group, a top multi-sector conglomerate in Myanmar.</p>',
                '/storage/uploads/demo/product-details/general/plus.png',
                '<p>We listen to your feedback and will to respond to your concerns in a fair and timely manner.</p>
                <p>We process claims in a fair and timely manner.</p>
                <p>Our life advisors and life agents follow a strict code of conduct and best practices.</p>',
                '/storage/uploads/demo/product-details/general/better-life.png',
                '<p>We are committed to create a positive social impact through our products and services and to empower the people of Myanmar to live a better life.</p>',
                '/storage/uploads/demo/product-details/general/face.png',
                '<p>We believe in being honest and transparent with our customers and recommending solutions based on our customers’ needs.</p>
                <p>We are making insurance available to all segments of society.</p>',
                '/storage/uploads/demo/product-details/general/money.png',
                '<p>We aim to serve our customers with professionalism and integrity, guide by strong moral values.</p>
                <p>We provide comprehensive explanation on the solutions based on your needs, so that you can understand their features, benefits, and risks, terms and conditions, and your commitment - before you make your purchase decision.</p>'
            ],
            [
                'Cash in transit insurance',
                '/storage/uploads/demo/general/insurance.svg',
                '/storage/uploads/demo/general-cover.jpg',
                4,
                '/storage/uploads/demo/moving-in.jpg',
                '/storage/uploads/demo/ratings-efi-l.svg',
                '/storage/uploads/demo/product-details/general/tick.png',
                '<p>We are a financially sound and strong company backed by Excellent Fortune Development Group, a top multi-sector conglomerate in Myanmar.</p>',
                '/storage/uploads/demo/product-details/general/plus.png',
                '<p>We listen to your feedback and will to respond to your concerns in a fair and timely manner.</p>
                <p>We process claims in a fair and timely manner.</p>
                <p>Our life advisors and life agents follow a strict code of conduct and best practices.</p>',
                '/storage/uploads/demo/product-details/general/better-life.png',
                '<p>We are committed to create a positive social impact through our products and services and to empower the people of Myanmar to live a better life.</p>',
                '/storage/uploads/demo/product-details/general/face.png',
                '<p>We believe in being honest and transparent with our customers and recommending solutions based on our customers’ needs.</p>
                <p>We are making insurance available to all segments of society.</p>',
                '/storage/uploads/demo/product-details/general/money.png',
                '<p>We aim to serve our customers with professionalism and integrity, guide by strong moral values.</p>
                <p>We provide comprehensive explanation on the solutions based on your needs, so that you can understand their features, benefits, and risks, terms and conditions, and your commitment - before you make your purchase decision.</p>'
            ],
            [
                'Fidelity insurance',
                '/storage/uploads/demo/general/partnership-handshake.svg',
                '/storage/uploads/demo/general-cover.jpg',
                4,
                '/storage/uploads/demo/moving-in.jpg',
                '/storage/uploads/demo/ratings-efi-l.svg',
                '/storage/uploads/demo/product-details/general/tick.png',
                '<p>We are a financially sound and strong company backed by Excellent Fortune Development Group, a top multi-sector conglomerate in Myanmar.</p>',
                '/storage/uploads/demo/product-details/general/plus.png',
                '<p>We listen to your feedback and will to respond to your concerns in a fair and timely manner.</p>
                <p>We process claims in a fair and timely manner.</p>
                <p>Our life advisors and life agents follow a strict code of conduct and best practices.</p>',
                '/storage/uploads/demo/product-details/general/better-life.png',
                '<p>We are committed to create a positive social impact through our products and services and to empower the people of Myanmar to live a better life.</p>',
                '/storage/uploads/demo/product-details/general/face.png',
                '<p>We believe in being honest and transparent with our customers and recommending solutions based on our customers’ needs.</p>
                <p>We are making insurance available to all segments of society.</p>',
                '/storage/uploads/demo/product-details/general/money.png',
                '<p>We aim to serve our customers with professionalism and integrity, guide by strong moral values.</p>
                <p>We provide comprehensive explanation on the solutions based on your needs, so that you can understand their features, benefits, and risks, terms and conditions, and your commitment - before you make your purchase decision.</p>'
            ],
            [
                'Cargo intrinsic insurance',
                '/storage/uploads/demo/general/package.svg',
                '/storage/uploads/demo/general-cover.jpg',
                4,
                '/storage/uploads/demo/moving-in.jpg',
                '/storage/uploads/demo/ratings-efi-l.svg',
                '/storage/uploads/demo/product-details/general/tick.png',
                '<p>We are a financially sound and strong company backed by Excellent Fortune Development Group, a top multi-sector conglomerate in Myanmar.</p>',
                '/storage/uploads/demo/product-details/general/plus.png',
                '<p>We listen to your feedback and will to respond to your concerns in a fair and timely manner.</p>
                <p>We process claims in a fair and timely manner.</p>
                <p>Our life advisors and life agents follow a strict code of conduct and best practices.</p>',
                '/storage/uploads/demo/product-details/general/better-life.png',
                '<p>We are committed to create a positive social impact through our products and services and to empower the people of Myanmar to live a better life.</p>',
                '/storage/uploads/demo/product-details/general/face.png',
                '<p>We believe in being honest and transparent with our customers and recommending solutions based on our customers’ needs.</p>
                <p>We are making insurance available to all segments of society.</p>',
                '/storage/uploads/demo/product-details/general/money.png',
                '<p>We aim to serve our customers with professionalism and integrity, guide by strong moral values.</p>
                <p>We provide comprehensive explanation on the solutions based on your needs, so that you can understand their features, benefits, and risks, terms and conditions, and your commitment - before you make your purchase decision.</p>'
            ],
            [
                'Short term endowment insurance',
                '/storage/uploads/demo/life/save-money.svg',
                '/storage/uploads/demo/life-cover.jpg',
                3,
                '/storage/uploads/demo/life-detail-about.jpg',
                '/storage/uploads/demo/ratings-efi-l.svg',
                '/storage/uploads/demo/product-details/life/tick.png',
                '<ul>
                <li>Policy terms: 5 years, 7 years, 10 years (As you choose)</li>
                <li>Premium Terms: 5 years, 7 years, 10 years</li>
                </ul>',
                '/storage/uploads/demo/product-details/life/plus.png',
                '<p>We listen to your feedback and will to respond to your concerns in a fair and timely manner.</p>
                <p>We process claims in a fair and timely manner.</p>
                <p>Our life advisors and life agents follow a strict code of conduct and best practices.</p>',
                '/storage/uploads/demo/product-details/life/better-life.png',
                '<ul>
                <li>Sum Assured starts from 1,000,000 kyats and up to 50,000,000 kyats</li>
                <li>Flexible payment terms: Monthly, quarterly, semi annually or annually.</li>
                </ul>',
                '/storage/uploads/demo/product-details/life/face.png',
                '<p>We believe in being honest and transparent with our customers and recommending solutions based on our customers’ needs.</p>
                <p>We are making insurance available to all segments of society.</p>',
                '/storage/uploads/demo/product-details/life/money.png',
                '<ul>
                <li>Insurable age: 10 to 60 years old.</li>
                </ul>'
            ],
            [
                'Student Life Insurance',
                '/storage/uploads/demo/life/graduate.svg',
                '/storage/uploads/demo/life-cover.jpg',
                3,
                '/storage/uploads/demo/life-detail-about.jpg',
                '/storage/uploads/demo/ratings-efi-l.svg',
                '/storage/uploads/demo/product-details/life/tick.png',
                '<ul>
                <li>Policy terms: 5 years, 7 years, 10 years (As you choose)</li>
                <li>Premium Terms: 5 years, 7 years, 10 years</li>
                </ul>',
                '/storage/uploads/demo/product-details/life/plus.png',
                '<p>We listen to your feedback and will to respond to your concerns in a fair and timely manner.</p>
                <p>We process claims in a fair and timely manner.</p>
                <p>Our life advisors and life agents follow a strict code of conduct and best practices.</p>',
                '/storage/uploads/demo/product-details/life/better-life.png',
                '<ul>
                <li>Sum Assured starts from 1,000,000 kyats and up to 50,000,000 kyats</li>
                <li>Flexible payment terms: Monthly, quarterly, semi annually or annually.</li>
                </ul>',
                '/storage/uploads/demo/product-details/life/face.png',
                '<p>We believe in being honest and transparent with our customers and recommending solutions based on our customers’ needs.</p>
                <p>We are making insurance available to all segments of society.</p>',
                '/storage/uploads/demo/product-details/life/money.png',
                '<ul>
                <li>Insurable age: 10 to 60 years old.</li>
                </ul>'
            ],
            [
                'Educational Life Insurance',
                '/storage/uploads/demo/life/teacher.svg',
                '/storage/uploads/demo/life-cover.jpg',
                3,
                '/storage/uploads/demo/life-detail-about.jpg',
                '/storage/uploads/demo/ratings-efi-l.svg',
                '/storage/uploads/demo/product-details/life/tick.png',
                '<ul>
                <li>Policy terms: 5 years, 7 years, 10 years (As you choose)</li>
                <li>Premium Terms: 5 years, 7 years, 10 years</li>
                </ul>',
                '/storage/uploads/demo/product-details/life/plus.png',
                '<p>We listen to your feedback and will to respond to your concerns in a fair and timely manner.</p>
                <p>We process claims in a fair and timely manner.</p>
                <p>Our life advisors and life agents follow a strict code of conduct and best practices.</p>',
                '/storage/uploads/demo/product-details/life/better-life.png',
                '<ul>
                <li>Sum Assured starts from 1,000,000 kyats and up to 50,000,000 kyats</li>
                <li>Flexible payment terms: Monthly, quarterly, semi annually or annually.</li>
                </ul>',
                '/storage/uploads/demo/product-details/life/face.png',
                '<p>We believe in being honest and transparent with our customers and recommending solutions based on our customers’ needs.</p>
                <p>We are making insurance available to all segments of society.</p>',
                '/storage/uploads/demo/product-details/life/money.png',
                '<ul>
                <li>Insurable age: 10 to 60 years old.</li>
                </ul>'
            ],
            [
                'Public Terms Life Insurnace',
                '/storage/uploads/demo/life/family-insurance.svg',
                '/storage/uploads/demo/life-cover.jpg',
                3,
                '/storage/uploads/demo/life-detail-about.jpg',
                '/storage/uploads/demo/ratings-efi-l.svg',
                '/storage/uploads/demo/product-details/life/tick.png',
                '<ul>
                <li>Policy terms: 5 years, 7 years, 10 years (As you choose)</li>
                <li>Premium Terms: 5 years, 7 years, 10 years</li>
                </ul>',
                '/storage/uploads/demo/product-details/life/plus.png',
                '<p>We listen to your feedback and will to respond to your concerns in a fair and timely manner.</p>
                <p>We process claims in a fair and timely manner.</p>
                <p>Our life advisors and life agents follow a strict code of conduct and best practices.</p>',
                '/storage/uploads/demo/product-details/life/better-life.png',
                '<ul>
                <li>Sum Assured starts from 1,000,000 kyats and up to 50,000,000 kyats</li>
                <li>Flexible payment terms: Monthly, quarterly, semi annually or annually.</li>
                </ul>',
                '/storage/uploads/demo/product-details/life/face.png',
                '<p>We believe in being honest and transparent with our customers and recommending solutions based on our customers’ needs.</p>
                <p>We are making insurance available to all segments of society.</p>',
                '/storage/uploads/demo/product-details/life/money.png',
                '<ul>
                <li>Insurable age: 10 to 60 years old.</li>
                </ul>'
            ],
            [
                'Personal accident life insurance',
                '/storage/uploads/demo/life/health-insurance.svg',
                '/storage/uploads/demo/life-cover.jpg',
                3,
                '/storage/uploads/demo/life-detail-about.jpg',
                '/storage/uploads/demo/ratings-efi-l.svg',
                '/storage/uploads/demo/product-details/life/tick.png',
                '<ul>
                <li>Policy terms: 5 years, 7 years, 10 years (As you choose)</li>
                <li>Premium Terms: 5 years, 7 years, 10 years</li>
                </ul>',
                '/storage/uploads/demo/product-details/life/plus.png',
                '<p>We listen to your feedback and will to respond to your concerns in a fair and timely manner.</p>
                <p>We process claims in a fair and timely manner.</p>
                <p>Our life advisors and life agents follow a strict code of conduct and best practices.</p>',
                '/storage/uploads/demo/product-details/life/better-life.png',
                '<ul>
                <li>Sum Assured starts from 1,000,000 kyats and up to 50,000,000 kyats</li>
                <li>Flexible payment terms: Monthly, quarterly, semi annually or annually.</li>
                </ul>',
                '/storage/uploads/demo/product-details/life/face.png',
                '<p>We believe in being honest and transparent with our customers and recommending solutions based on our customers’ needs.</p>
                <p>We are making insurance available to all segments of society.</p>',
                '/storage/uploads/demo/product-details/life/money.png',
                '<ul>
                <li>Insurable age: 10 to 60 years old.</li>
                </ul>'
            ],
            [
                'Group Life Insurance',
                '/storage/uploads/demo/life/family-insurance.svg',
                '/storage/uploads/demo/life-cover.jpg',
                3,
                '/storage/uploads/demo/life-detail-about.jpg',
                '/storage/uploads/demo/ratings-efi-l.svg',
                '/storage/uploads/demo/product-details/life/tick.png',
                '<ul>
                <li>Policy terms: 5 years, 7 years, 10 years (As you choose)</li>
                <li>Premium Terms: 5 years, 7 years, 10 years</li>
                </ul>',
                '/storage/uploads/demo/product-details/life/plus.png',
                '<p>We listen to your feedback and will to respond to your concerns in a fair and timely manner.</p>
                <p>We process claims in a fair and timely manner.</p>
                <p>Our life advisors and life agents follow a strict code of conduct and best practices.</p>',
                '/storage/uploads/demo/product-details/life/better-life.png',
                '<ul>
                <li>Sum Assured starts from 1,000,000 kyats and up to 50,000,000 kyats</li>
                <li>Flexible payment terms: Monthly, quarterly, semi annually or annually.</li>
                </ul>',
                '/storage/uploads/demo/product-details/life/face.png',
                '<p>We believe in being honest and transparent with our customers and recommending solutions based on our customers’ needs.</p>
                <p>We are making insurance available to all segments of society.</p>',
                '/storage/uploads/demo/product-details/life/money.png',
                '<ul>
                <li>Insurable age: 10 to 60 years old.</li>
                </ul>'
            ],
            [
                'Single Premium Credit Life',
                '/storage/uploads/demo/life/umbrella.svg',
                '/storage/uploads/demo/life-cover.jpg',
                3,
                '/storage/uploads/demo/life-detail-about.jpg',
                '/storage/uploads/demo/ratings-efi-l.svg',
                '/storage/uploads/demo/product-details/life/tick.png',
                '<ul>
                <li>Policy terms: 5 years, 7 years, 10 years (As you choose)</li>
                <li>Premium Terms: 5 years, 7 years, 10 years</li>
                </ul>',
                '/storage/uploads/demo/product-details/life/plus.png',
                '<p>We listen to your feedback and will to respond to your concerns in a fair and timely manner.</p>
                <p>We process claims in a fair and timely manner.</p>
                <p>Our life advisors and life agents follow a strict code of conduct and best practices.</p>',
                '/storage/uploads/demo/product-details/life/better-life.png',
                '<ul>
                <li>Sum Assured starts from 1,000,000 kyats and up to 50,000,000 kyats</li>
                <li>Flexible payment terms: Monthly, quarterly, semi annually or annually.</li>
                </ul>',
                '/storage/uploads/demo/product-details/life/face.png',
                '<p>We believe in being honest and transparent with our customers and recommending solutions based on our customers’ needs.</p>
                <p>We are making insurance available to all segments of society.</p>',
                '/storage/uploads/demo/product-details/life/money.png',
                '<ul>
                <li>Insurable age: 10 to 60 years old.</li>
                </ul>'
            ],
            [
                'Short term single premium credit life insurance',
                '/storage/uploads/demo/life/insurance.svg',
                '/storage/uploads/demo/life-cover.jpg',
                3,
                '/storage/uploads/demo/life-detail-about.jpg',
                '/storage/uploads/demo/ratings-efi-l.svg',
                '/storage/uploads/demo/product-details/life/tick.png',
                '<ul>
                <li>Policy terms: 5 years, 7 years, 10 years (As you choose)</li>
                <li>Premium Terms: 5 years, 7 years, 10 years</li>
                </ul>',
                '/storage/uploads/demo/product-details/life/plus.png',
                '<p>We listen to your feedback and will to respond to your concerns in a fair and timely manner.</p>
                <p>We process claims in a fair and timely manner.</p>
                <p>Our life advisors and life agents follow a strict code of conduct and best practices.</p>',
                '/storage/uploads/demo/product-details/life/better-life.png',
                '<ul>
                <li>Sum Assured starts from 1,000,000 kyats and up to 50,000,000 kyats</li>
                <li>Flexible payment terms: Monthly, quarterly, semi annually or annually.</li>
                </ul>',
                '/storage/uploads/demo/product-details/life/face.png',
                '<p>We believe in being honest and transparent with our customers and recommending solutions based on our customers’ needs.</p>
                <p>We are making insurance available to all segments of society.</p>',
                '/storage/uploads/demo/product-details/life/money.png',
                '<ul>
                <li>Insurable age: 10 to 60 years old.</li>
                </ul>'
            ],
            [
                'Travel Insurance',
                '/storage/uploads/demo/life/travel-insurance.svg',
                '/storage/uploads/demo/life-cover.jpg',
                3,
                '/storage/uploads/demo/life-detail-about.jpg',
                '/storage/uploads/demo/ratings-efi-l.svg',
                '/storage/uploads/demo/product-details/life/tick.png',
                '<ul>
                <li>Policy terms: 5 years, 7 years, 10 years (As you choose)</li>
                <li>Premium Terms: 5 years, 7 years, 10 years</li>
                </ul>',
                '/storage/uploads/demo/product-details/life/plus.png',
                '<p>We listen to your feedback and will to respond to your concerns in a fair and timely manner.</p>
                <p>We process claims in a fair and timely manner.</p>
                <p>Our life advisors and life agents follow a strict code of conduct and best practices.</p>',
                '/storage/uploads/demo/product-details/life/better-life.png',
                '<ul>
                <li>Sum Assured starts from 1,000,000 kyats and up to 50,000,000 kyats</li>
                <li>Flexible payment terms: Monthly, quarterly, semi annually or annually.</li>
                </ul>',
                '/storage/uploads/demo/product-details/life/face.png',
                '<p>We believe in being honest and transparent with our customers and recommending solutions based on our customers’ needs.</p>
                <p>We are making insurance available to all segments of society.</p>',
                '/storage/uploads/demo/product-details/life/money.png',
                '<ul>
                <li>Insurable age: 10 to 60 years old.</li>
                </ul>'
            ],
            [
                'Farmer Insurance',
                '/storage/uploads/demo/life/farmer.svg',
                '/storage/uploads/demo/life-cover.jpg',
                3,
                '/storage/uploads/demo/life-detail-about.jpg',
                '/storage/uploads/demo/ratings-efi-l.svg',
                '/storage/uploads/demo/product-details/life/tick.png',
                '<ul>
                <li>Policy terms: 5 years, 7 years, 10 years (As you choose)</li>
                <li>Premium Terms: 5 years, 7 years, 10 years</li>
                </ul>',
                '/storage/uploads/demo/product-details/life/plus.png',
                '<p>We listen to your feedback and will to respond to your concerns in a fair and timely manner.</p>
                <p>We process claims in a fair and timely manner.</p>
                <p>Our life advisors and life agents follow a strict code of conduct and best practices.</p>',
                '/storage/uploads/demo/product-details/life/better-life.png',
                '<ul>
                <li>Sum Assured starts from 1,000,000 kyats and up to 50,000,000 kyats</li>
                <li>Flexible payment terms: Monthly, quarterly, semi annually or annually.</li>
                </ul>',
                '/storage/uploads/demo/product-details/life/face.png',
                '<p>We believe in being honest and transparent with our customers and recommending solutions based on our customers’ needs.</p>
                <p>We are making insurance available to all segments of society.</p>',
                '/storage/uploads/demo/product-details/life/money.png',
                '<ul>
                <li>Insurable age: 10 to 60 years old.</li>
                </ul>'
            ],
            [
                'Snake Bite life Insurance',
                '/storage/uploads/storage/uploads/demo/life/snake.svg',
                '/storage/uploads/storage/uploads/demo/life-cover.jpg',
                3,
                '/storage/uploads/demo/life-detail-about.jpg',
                '/storage/uploads/demo/ratings-efi-l.svg',
                '/storage/uploads/demo/product-details/life/tick.png',
                '<ul>
                <li>Policy terms: 5 years, 7 years, 10 years (As you choose)</li>
                <li>Premium Terms: 5 years, 7 years, 10 years</li>
                </ul>',
                '/storage/uploads/demo/product-details/life/plus.png',
                '<p>We listen to your feedback and will to respond to your concerns in a fair and timely manner.</p>
                <p>We process claims in a fair and timely manner.</p>
                <p>Our life advisors and life agents follow a strict code of conduct and best practices.</p>',
                '/storage/uploads/demo/product-details/life/better-life.png',
                '<ul>
                <li>Sum Assured starts from 1,000,000 kyats and up to 50,000,000 kyats</li>
                <li>Flexible payment terms: Monthly, quarterly, semi annually or annually.</li>
                </ul>',
                '/storage/uploads/demo/product-details/life/face.png',
                '<p>We believe in being honest and transparent with our customers and recommending solutions based on our customers’ needs.</p>
                <p>We are making insurance available to all segments of society.</p>',
                '/storage/uploads/demo/product-details/life/money.png',
                '<ul>
                <li>Insurable age: 10 to 60 years old.</li>
                </ul>'
            ],
            [
                'Health Insurance',
                '/storage/uploads/demo/life/healthcare.svg',
                '/storage/uploads/demo/life-cover.jpg',
                3,
                '/storage/uploads/demo/life-detail-about.jpg',
                '/storage/uploads/demo/ratings-efi-l.svg',
                '/storage/uploads/demo/product-details/life/tick.png',
                '<ul>
                <li>Policy terms: 5 years, 7 years, 10 years (As you choose)</li>
                <li>Premium Terms: 5 years, 7 years, 10 years</li>
                </ul>',
                '/storage/uploads/demo/product-details/life/plus.png',
                '<p>We listen to your feedback and will to respond to your concerns in a fair and timely manner.</p>
                <p>We process claims in a fair and timely manner.</p>
                <p>Our life advisors and life agents follow a strict code of conduct and best practices.</p>',
                '/storage/uploads/demo/product-details/life/better-life.png',
                '<ul>
                <li>Sum Assured starts from 1,000,000 kyats and up to 50,000,000 kyats</li>
                <li>Flexible payment terms: Monthly, quarterly, semi annually or annually.</li>
                </ul>',
                '/storage/uploads/demo/product-details/life/face.png',
                '<p>We believe in being honest and transparent with our customers and recommending solutions based on our customers’ needs.</p>
                <p>We are making insurance available to all segments of society.</p>',
                '/storage/uploads/demo/product-details/life/money.png',
                '<ul>
                <li>Insurable age: 10 to 60 years old.</li>
                </ul>'
            ],
            [
                'Critical Illness Insurance',
                '/storage/uploads/demo/life/life-insurance.svg',
                '/storage/uploads/demo/life-cover.jpg',
                3,
                '/storage/uploads/demo/life-detail-about.jpg',
                '/storage/uploads/demo/ratings-efi-l.svg',
                '/storage/uploads/demo/product-details/life/tick.png',
                '<ul>
                <li>Policy terms: 5 years, 7 years, 10 years (As you choose)</li>
                <li>Premium Terms: 5 years, 7 years, 10 years</li>
                </ul>',
                '/storage/uploads/demo/product-details/life/plus.png',
                '<p>We listen to your feedback and will to respond to your concerns in a fair and timely manner.</p>
                <p>We process claims in a fair and timely manner.</p>
                <p>Our life advisors and life agents follow a strict code of conduct and best practices.</p>',
                '/storage/uploads/demo/product-details/life/better-life.png',
                '<ul>
                <li>Sum Assured starts from 1,000,000 kyats and up to 50,000,000 kyats</li>
                <li>Flexible payment terms: Monthly, quarterly, semi annually or annually.</li>
                </ul>',
                '/storage/uploads/demo/product-details/life/face.png',
                '<p>We believe in being honest and transparent with our customers and recommending solutions based on our customers’ needs.</p>
                <p>We are making insurance available to all segments of society.</p>',
                '/storage/uploads/demo/product-details/life/money.png',
                '<ul>
                <li>Insurable age: 10 to 60 years old.</li>
                </ul>'
            ],
            [
                'Micro health insurance',
                '/storage/uploads/demo/life/drug.svg',
                '/storage/uploads/demo/life-cover.jpg',
                3,
                '/storage/uploads/demo/life-detail-about.jpg',
                '/storage/uploads/demo/ratings-efi-l.svg',
                '/storage/uploads/demo/product-details/life/tick.png',
                '<ul>
                <li>Policy terms: 5 years, 7 years, 10 years (As you choose)</li>
                <li>Premium Terms: 5 years, 7 years, 10 years</li>
                </ul>',
                '/storage/uploads/demo/product-details/life/plus.png',
                '<p>We listen to your feedback and will to respond to your concerns in a fair and timely manner.</p>
                <p>We process claims in a fair and timely manner.</p>
                <p>Our life advisors and life agents follow a strict code of conduct and best practices.</p>',
                '/storage/uploads/demo/product-details/life/better-life.png',
                '<ul>
                <li>Sum Assured starts from 1,000,000 kyats and up to 50,000,000 kyats</li>
                <li>Flexible payment terms: Monthly, quarterly, semi annually or annually.</li>
                </ul>',
                '/storage/uploads/demo/product-details/life/face.png',
                '<p>We believe in being honest and transparent with our customers and recommending solutions based on our customers’ needs.</p>
                <p>We are making insurance available to all segments of society.</p>',
                '/storage/uploads/demo/product-details/life/money.png',
                '<ul>
                <li>Insurable age: 10 to 60 years old.</li>
                </ul>'
            ],
        ];

        $pages = [];
        $blogs = [];
        $jobs = [];

        for ($i = 0; $i < 25; $i++) {
            /*
            * Product Sample Data Inputs
            */
            if ($i < 23) {
                Product::create([
                    'title' => json_encode([
                        'en-us' => $product_info[$i][0],
                        'my-mm' => 'စမ်းသပ် ထုတ်ကုန် ' . ($i + 1),
                        'zh-cn' => '高標催極用 ' . ($i + 1)
                    ]),
                    'slogan' => json_encode([
                        'en-us' => 'Lorem ipsum is a pseudo-Latin text used in web design, typography and layout.',
                        'my-mm' => 'စမ်းသပ် ထုတ်ကုန် အကြောင်း',
                        'zh-cn' => '高標催極用'
                    ]),
                    'image' => $product_info[$i][1],
                    'cover_image' => $product_info[$i][2],
                    'apply_insurance' => json_encode([
                        'en-us' => [
                            'title' => 'Apply This Insurance',
                            'description' => '<p>Lorem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English to emphasise design elements over content. It\'s also called placeholder (or filler) text. It\'s a convenient tool for mock-ups. It helps to outline the visual elements of a document or presentation, eg typography, font, or layout. Lorem ipsum is mostly a part of a Latin text by the classical author and philosopher Cicero. Its words and letters have been changed by addition or removal, so to deliberately render its content nonsensical; it\'s not genuine, correct, or comprehensible Latin anymore. While lorem ipsum\'s still resembles classical Latin, it actually has no meaning whatsoever. As Cicero\'s text doesn\'t contain the letters K, W, or Z, alien to latin, these, and others are often inserted randomly to mimic the typographic appearence of European languages, as are digraphs not to be found in the original.</p><p>In a professional context it often happens that private or corporate clients corder a publication to be made and presented with the actual content still not being ready. Think of a news blog that\'s filled with content hourly on the day of going live. However, reviewers tend to be distracted by comprehensible content, say, a random text copied from a newspaper or the internet. The are likely to focus on the text, disregarding the layout and its elements. Besides, random text risks to be unintendedly humorous or offensive, an unacceptable risk in corporate environments. Lorem ipsum and its many variants have been employed since the early 1960ies, and quite likely since the sixteenth century.</p>',
                            'buttonText' => 'Apply Now'
                        ],
                        'my-mm' => [
                            'title' => 'ဤအာမခံကို လျောက်ထားမည်',
                            'description' => '<p>သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။</p><p>သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။</p>',
                            'buttonText' => 'အခု လျောက်မယ်'
                        ],
                        'zh-cn' => [
                            'title' => '夏川面結地勝覧署喜金亡無就事天',
                            'description' => '<p>新社違育人交日主根界際連。幹製高心破事候晴腰無舌一取行意野改。存分軒余調能義以文期浩季佐際連届止導県功。高標催極用結枝動総暮護納意司。島賠甲分画件史訪合見詳問歳気挑高知打月松。虫元記止表購途桂料記少今治。手康権術込著中井今必人終。育様美幕求氏後塾政中抗編記走表。迫相示良提入様立発料問変泉返蒼都平。</p><p>中岩宣尚王激失母分階施級。夏川面結地勝覧署喜金亡無就事天。社意度恵症出助中責豪作車対質。聞片上徳覧質属側体自左員査言残加昨白。作気関変業盤決訴処耳前儲。源平無原子位都点分活首止聞気応府自未党孤。方金話度終面凱邦形全覧後覧的愛扱。革県式分料流地入籍断断情。使聞体徹的役書強察分種務家林困功入問加。指番国成統常期術全場夜本</p>',
                            'buttonText' => '高標催極用'
                        ],
                    ]),
                    'why_work_with_us' => json_encode([
                        'en-us' => [
                            'title' => 'Why Work With EFI G',
                            'description' => '<p>Lorem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English to emphasise design elements over content. It\'s also called placeholder (or filler) text. It\'s a convenient tool for mock-ups. It helps to outline the visual elements of a document or presentation, eg typography, font, or layout. Lorem ipsum is mostly a part of a Latin text by the classical author and philosopher Cicero. Its words and letters have been changed by addition or removal, so to deliberately render its content nonsensical; it\'s not genuine, correct, or comprehensible Latin anymore. While lorem ipsum\'s still resembles classical Latin, it actually has no meaning whatsoever. As Cicero\'s text doesn\'t contain the letters K, W, or Z, alien to latin, these, and others are often inserted randomly to mimic the typographic appearence of European languages, as are digraphs not to be found in the original.</p><p>In a professional context it often happens that private or corporate clients corder a publication to be made and presented with the actual content still not being ready. Think of a news blog that\'s filled with content hourly on the day of going live. However, reviewers tend to be distracted by comprehensible content, say, a random text copied from a newspaper or the internet. The are likely to focus on the text, disregarding the layout and its elements. Besides, random text risks to be unintendedly humorous or offensive, an unacceptable risk in corporate environments. Lorem ipsum and its many variants have been employed since the early 1960ies, and quite likely since the sixteenth century.</p>',
                            'image' => '/storage/uploads/demo/ratings-efi-l.svg',
                        ],
                        'my-mm' => [
                            'title' => 'ဘာကြောင့် အီအက်ဖ်အိုင်ဂျီ နဲ့ လက်တွဲသင့်သလဲ',
                            'description' => '<p>သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။</p><p>သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။</p>',
                            'image' => '/storage/uploads/demo/ratings-efi-l.svg',
                        ],
                        'zh-cn' => [
                            'title' => '夏川面結地勝覧署喜金亡無就事天',
                            'description' => '<p>新社違育人交日主根界際連。幹製高心破事候晴腰無舌一取行意野改。存分軒余調能義以文期浩季佐際連届止導県功。高標催極用結枝動総暮護納意司。島賠甲分画件史訪合見詳問歳気挑高知打月松。虫元記止表購途桂料記少今治。手康権術込著中井今必人終。育様美幕求氏後塾政中抗編記走表。迫相示良提入様立発料問変泉返蒼都平。</p><p>中岩宣尚王激失母分階施級。夏川面結地勝覧署喜金亡無就事天。社意度恵症出助中責豪作車対質。聞片上徳覧質属側体自左員査言残加昨白。作気関変業盤決訴処耳前儲。源平無原子位都点分活首止聞気応府自未党孤。方金話度終面凱邦形全覧後覧的愛扱。革県式分料流地入籍断断情。使聞体徹的役書強察分種務家林困功入問加。指番国成統常期術全場夜本</p>',
                            'image' => '/storage/uploads/demo/ratings-efi-l.svg',
                        ],
                    ]),
                    'lr' => json_encode([
                        'en-us' => [
                            [
                                'title' => 'Product Description',
                                'description' => '<p>Lorem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English to emphasise design elements over content. It\'s also called placeholder (or filler) text. It\'s a convenient tool for mock-ups. It helps to outline the visual elements of a document or presentation, eg typography, font, or layout. Lorem ipsum is mostly a part of a Latin text by the classical author and philosopher Cicero. Its words and letters have been changed by addition or removal, so to deliberately render its content nonsensical; it\'s not genuine, correct, or comprehensible Latin anymore. While lorem ipsum\'s still resembles classical Latin, it actually has no meaning whatsoever. As Cicero\'s text doesn\'t contain the letters K, W, or Z, alien to latin, these, and others are often inserted randomly to mimic the typographic appearence of European languages, as are digraphs not to be found in the original.</p><p>In a professional context it often happens that private or corporate clients corder a publication to be made and presented with the actual content still not being ready. Think of a news blog that\'s filled with content hourly on the day of going live. However, reviewers tend to be distracted by comprehensible content, say, a random text copied from a newspaper or the internet. The are likely to focus on the text, disregarding the layout and its elements. Besides, random text risks to be unintendedly humorous or offensive, an unacceptable risk in corporate environments. Lorem ipsum and its many variants have been employed since the early 1960ies, and quite likely since the sixteenth century.</p>',
                                'image' => $product_info[$i][4]
                            ],
                        ],
                        'my-mm' => [
                            [
                                'title' => 'အကြောင်းအရာ',
                                'description' => '<p>သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။</p><p>သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။</p>',
                                'image' => $product_info[$i][4]
                            ],
                        ],
                        'zh-cn' => [
                            [
                                'title' => '夏川面結地勝覧署喜金亡無就事天',
                                'description' => '<p>新社違育人交日主根界際連。幹製高心破事候晴腰無舌一取行意野改。存分軒余調能義以文期浩季佐際連届止導県功。高標催極用結枝動総暮護納意司。島賠甲分画件史訪合見詳問歳気挑高知打月松。虫元記止表購途桂料記少今治。手康権術込著中井今必人終。育様美幕求氏後塾政中抗編記走表。迫相示良提入様立発料問変泉返蒼都平。</p><p>中岩宣尚王激失母分階施級。夏川面結地勝覧署喜金亡無就事天。社意度恵症出助中責豪作車対質。聞片上徳覧質属側体自左員査言残加昨白。作気関変業盤決訴処耳前儲。源平無原子位都点分活首止聞気応府自未党孤。方金話度終面凱邦形全覧後覧的愛扱。革県式分料流地入籍断断情。使聞体徹的役書強察分種務家林困功入問加。指番国成統常期術全場夜本</p>',
                                'image' => $product_info[$i][4]
                            ],
                        ],
                    ]),
                    'faq' => json_encode([
                        'en-us' => [
                            'title' => 'Frequently Asked Questions',
                            'data' => [
                                [
                                    'question' => 'Lorem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English?',
                                    'answers' => '<p>Most of its text is made up from sections 1.10.32–3 of Cicero\'s De finibus bonorum et malorum (On the Boundaries of Goods and Evils; finibus may also be translated as purposes). Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit is the first known version ("Neither is there anyone who loves grief itself since it is grief and thus wants to obtain it"). It was found by Richard McClintock, a philologist, director of publications at Hampden-Sydney College in Virginia; he searched for citings of consectetur in classical Latin literature, a term of remarkably low frequency in that literary corpus.</p>'
                                ],
                                [
                                    'question' => 'Lorem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English?',
                                    'answers' => '<p>Most of its text is made up from sections 1.10.32–3 of Cicero\'s De finibus bonorum et malorum (On the Boundaries of Goods and Evils; finibus may also be translated as purposes). Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit is the first known version ("Neither is there anyone who loves grief itself since it is grief and thus wants to obtain it"). It was found by Richard McClintock, a philologist, director of publications at Hampden-Sydney College in Virginia; he searched for citings of consectetur in classical Latin literature, a term of remarkably low frequency in that literary corpus.</p>'
                                ],
                                [
                                    'question' => 'Lorem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English?',
                                    'answers' => '<p>Most of its text is made up from sections 1.10.32–3 of Cicero\'s De finibus bonorum et malorum (On the Boundaries of Goods and Evils; finibus may also be translated as purposes). Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit is the first known version ("Neither is there anyone who loves grief itself since it is grief and thus wants to obtain it"). It was found by Richard McClintock, a philologist, director of publications at Hampden-Sydney College in Virginia; he searched for citings of consectetur in classical Latin literature, a term of remarkably low frequency in that literary corpus.</p>'
                                ],
                                [
                                    'question' => 'Lorem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English?',
                                    'answers' => '<p>Most of its text is made up from sections 1.10.32–3 of Cicero\'s De finibus bonorum et malorum (On the Boundaries of Goods and Evils; finibus may also be translated as purposes). Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit is the first known version ("Neither is there anyone who loves grief itself since it is grief and thus wants to obtain it"). It was found by Richard McClintock, a philologist, director of publications at Hampden-Sydney College in Virginia; he searched for citings of consectetur in classical Latin literature, a term of remarkably low frequency in that literary corpus.</p>'
                                ],
                                [
                                    'question' => 'Lorem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English?',
                                    'answers' => '<p>Most of its text is made up from sections 1.10.32–3 of Cicero\'s De finibus bonorum et malorum (On the Boundaries of Goods and Evils; finibus may also be translated as purposes). Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit is the first known version ("Neither is there anyone who loves grief itself since it is grief and thus wants to obtain it"). It was found by Richard McClintock, a philologist, director of publications at Hampden-Sydney College in Virginia; he searched for citings of consectetur in classical Latin literature, a term of remarkably low frequency in that literary corpus.</p>'
                                ],
                            ],
                        ],
                        'my-mm' => [
                            'title' => 'မေးလေ့ရှိတဲ့ မေးခွန်းများ',
                            'data' => [
                                [
                                    'question' => 'စမ်းသပ် ကြေငြာ ထုတ်ကုန် စမ်းသပ် ရေးသားသည်',
                                    'answers' => '<p>သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။</p>'
                                ],
                                [
                                    'question' => 'စမ်းသပ် ကြေငြာ ထုတ်ကုန် စမ်းသပ် ရေးသားသည်',
                                    'answers' => '<p>သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။</p>'
                                ],
                                [
                                    'question' => 'စမ်းသပ် ကြေငြာ ထုတ်ကုန် စမ်းသပ် ရေးသားသည်',
                                    'answers' => '<p>သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။</p>'
                                ],
                                [
                                    'question' => 'စမ်းသပ် ကြေငြာ ထုတ်ကုန် စမ်းသပ် ရေးသားသည်',
                                    'answers' => '<p>သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။</p>'
                                ],
                                [
                                    'question' => 'စမ်းသပ် ကြေငြာ ထုတ်ကုန် စမ်းသပ် ရေးသားသည်',
                                    'answers' => '<p>သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။</p>'
                                ],
                            ],
                        ],
                        'zh-cn' => [
                            'title' => '高標催極用',
                            'data' => [
                                [
                                    'question' => '夏川面結地勝覧署喜金亡無就事天',
                                    'answers' => '<p>確触妖左州全照需道掲法覧転芸促球闘。設聞木力鄲保限転賛著間行長退女阜早外。口止本連統車富停街工全源著界復費担設。惑京保益半京第広験郎繰部阜親女険供気見。小念条検上政音車球質離毎掲。介出技持額介白闘思種式百京。治権月積説検干権足英滋社米勝投目興車援致。子恵少牟助送他月並司医個読。新軍場舞官引認一経除吉験住掲式目苦禁。</p>'
                                ],
                                [
                                    'question' => '夏川面結地勝覧署喜金亡無就事天',
                                    'answers' => '<p>確触妖左州全照需道掲法覧転芸促球闘。設聞木力鄲保限転賛著間行長退女阜早外。口止本連統車富停街工全源著界復費担設。惑京保益半京第広験郎繰部阜親女険供気見。小念条検上政音車球質離毎掲。介出技持額介白闘思種式百京。治権月積説検干権足英滋社米勝投目興車援致。子恵少牟助送他月並司医個読。新軍場舞官引認一経除吉験住掲式目苦禁。</p>'
                                ],
                                [
                                    'question' => '夏川面結地勝覧署喜金亡無就事天',
                                    'answers' => '<p>確触妖左州全照需道掲法覧転芸促球闘。設聞木力鄲保限転賛著間行長退女阜早外。口止本連統車富停街工全源著界復費担設。惑京保益半京第広験郎繰部阜親女険供気見。小念条検上政音車球質離毎掲。介出技持額介白闘思種式百京。治権月積説検干権足英滋社米勝投目興車援致。子恵少牟助送他月並司医個読。新軍場舞官引認一経除吉験住掲式目苦禁。</p>'
                                ],
                                [
                                    'question' => '夏川面結地勝覧署喜金亡無就事天',
                                    'answers' => '<p>確触妖左州全照需道掲法覧転芸促球闘。設聞木力鄲保限転賛著間行長退女阜早外。口止本連統車富停街工全源著界復費担設。惑京保益半京第広験郎繰部阜親女険供気見。小念条検上政音車球質離毎掲。介出技持額介白闘思種式百京。治権月積説検干権足英滋社米勝投目興車援致。子恵少牟助送他月並司医個読。新軍場舞官引認一経除吉験住掲式目苦禁。</p>'
                                ],
                                [
                                    'question' => '夏川面結地勝覧署喜金亡無就事天',
                                    'answers' => '<p>確触妖左州全照需道掲法覧転芸促球闘。設聞木力鄲保限転賛著間行長退女阜早外。口止本連統車富停街工全源著界復費担設。惑京保益半京第広験郎繰部阜親女険供気見。小念条検上政音車球質離毎掲。介出技持額介白闘思種式百京。治権月積説検干権足英滋社米勝投目興車援致。子恵少牟助送他月並司医個読。新軍場舞官引認一経除吉験住掲式目苦禁。</p>'
                                ],
                            ],
                        ],
                    ]),
                    'attachments' => json_encode([
                        'en-us' => [
                            [
                                'title' => 'Lorem Ipsum Dolor',
                                'description' => '<p>Lorem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English to emphasise design elements over content. It\'s also called placeholder (or filler) text. It\'s a convenient tool for mock-ups. It helps to outline the visual elements of a document or presentation, eg typography, font, or layout. Lorem ipsum is mostly a part of a Latin text by the classical author and philosopher Cicero. Its words and letters have been changed by addition or removal, so to deliberately render its content nonsensical; it\'s not genuine, correct, or comprehensible Latin anymore. While lorem ipsum\'s still resembles classical Latin, it actually has no meaning whatsoever. As Cicero\'s text doesn\'t contain the letters K, W, or Z, alien to latin, these, and others are often inserted randomly to mimic the typographic appearence of European languages, as are digraphs not to be found in the original.</p><p>In a professional context it often happens that private or corporate clients corder a publication to be made and presented with the actual content still not being ready. Think of a news blog that\'s filled with content hourly on the day of going live. However, reviewers tend to be distracted by comprehensible content, say, a random text copied from a newspaper or the internet. The are likely to focus on the text, disregarding the layout and its elements. Besides, random text risks to be unintendedly humorous or offensive, an unacceptable risk in corporate environments. Lorem ipsum and its many variants have been employed since the early 1960ies, and quite likely since the sixteenth century.</p>',
                                'icon' => '/storage/uploads/demo/image-icon.png',
                                'buttonText' => 'Download Proposa',
                                'proposal_file' => '/storage/uploads/proposals/' . Str::slug($product_info[$i][0], '-') . '.pdf',
                            ],
                        ],
                        'my-mm' => [
                            [
                                'title' => 'ဘာသာပြန် အကြောင်းအရာ',
                                'description' => '<p>သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။</p><p>သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။</p>',
                                'icon' => '/storage/uploads/demo/image-icon.png',
                                'buttonText' => 'ဘာသာပြန်ရန်',
                                'proposal_file' => '/storage/uploads/proposals/' . Str::slug($product_info[$i][0], '-') . '.pdf',
                            ],
                        ],
                        'zh-cn' => [
                            [
                                'title' => '夏川面結地勝覧署喜金亡無就事天',
                                'description' => '<p>新社違育人交日主根界際連。幹製高心破事候晴腰無舌一取行意野改。存分軒余調能義以文期浩季佐際連届止導県功。高標催極用結枝動総暮護納意司。島賠甲分画件史訪合見詳問歳気挑高知打月松。虫元記止表購途桂料記少今治。手康権術込著中井今必人終。育様美幕求氏後塾政中抗編記走表。迫相示良提入様立発料問変泉返蒼都平。</p><p>中岩宣尚王激失母分階施級。夏川面結地勝覧署喜金亡無就事天。社意度恵症出助中責豪作車対質。聞片上徳覧質属側体自左員査言残加昨白。作気関変業盤決訴処耳前儲。源平無原子位都点分活首止聞気応府自未党孤。方金話度終面凱邦形全覧後覧的愛扱。革県式分料流地入籍断断情。使聞体徹的役書強察分種務家林困功入問加。指番国成統常期術全場夜本</p>',
                                'icon' => '/storage/uploads/demo/image-icon.png',
                                'buttonText' => '高標催極用',
                                'proposal_file' => '/storage/uploads/proposals/' . Str::slug($product_info[$i][0], '-') . '.pdf',
                            ],
                        ],
                    ]),
                    'additional_benifits' => json_encode([
                        'en-us' => [
                            'title' => 'Enjoy Additional Benefits',
                            'data' => [
                                [
                                    'icon' => $product_info[$i][6],
                                    'text' => $product_info[$i][7],
                                ],
                                [
                                    'icon' => $product_info[$i][8],
                                    'text' => $product_info[$i][9],
                                ],
                                [
                                    'icon' => $product_info[$i][10],
                                    'text' => $product_info[$i][11],
                                ],
                                [
                                    'icon' => $product_info[$i][12],
                                    'text' => $product_info[$i][13],
                                ],
                                [
                                    'icon' => $product_info[$i][14],
                                    'text' => $product_info[$i][15],
                                ],
                            ],
                        ],
                        'my-mm' => [
                            'title' => 'ဘာသာပြန်ရန်',
                            'data' => [
                                [
                                    'icon' => $product_info[$i][1],
                                    'text' => '<p>သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။</p>'
                                ],
                                [
                                    'icon' => $product_info[$i][1],
                                    'text' => '<p>သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။</p>'
                                ],
                                [
                                    'icon' => $product_info[$i][1],
                                    'text' => '<p>သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။</p>'
                                ],
                            ],
                        ],
                        'zh-cn' => [
                            'title' => '高標催極用',
                            'data' => [
                                [
                                    'icon' => $product_info[$i][1],
                                    'text' => '<p>確触妖左州全照需道掲法覧転芸促球闘。設聞木力鄲保限転賛著間行長退女阜早外。口止本連統車富停街工全源著界復費担設。惑京保益半京第広験郎繰部阜親女険供気見。小念条検上政音車球質離毎掲。介出技持額介白闘思種式百京。治権月積説検干権足英滋社米勝投目興車援致。子恵少牟助送他月並司医個読。新軍場舞官引認一経除吉験住掲式目苦禁。</p>'
                                ],
                                [
                                    'icon' => $product_info[$i][1],
                                    'text' => '<p>確触妖左州全照需道掲法覧転芸促球闘。設聞木力鄲保限転賛著間行長退女阜早外。口止本連統車富停街工全源著界復費担設。惑京保益半京第広験郎繰部阜親女険供気見。小念条検上政音車球質離毎掲。介出技持額介白闘思種式百京。治権月積説検干権足英滋社米勝投目興車援致。子恵少牟助送他月並司医個読。新軍場舞官引認一経除吉験住掲式目苦禁。</p>'
                                ],
                                [
                                    'icon' => $product_info[$i][1],
                                    'text' => '<p>確触妖左州全照需道掲法覧転芸促球闘。設聞木力鄲保限転賛著間行長退女阜早外。口止本連統車富停街工全源著界復費担設。惑京保益半京第広験郎繰部阜親女険供気見。小念条検上政音車球質離毎掲。介出技持額介白闘思種式百京。治権月積説検干権足英滋社米勝投目興車援致。子恵少牟助送他月並司医個読。新軍場舞官引認一経除吉験住掲式目苦禁。</p>'
                                ],
                            ],
                        ],
                    ]),
                    'diagrams_and_table' => json_encode([
                        'en-us' => [
                            [
                                'title' => 'Benefits Diagram and Table',
                                'description' => '<p>Lorem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English to emphasise design elements over content. It\'s also called placeholder (or filler) text. It\'s a convenient tool for mock-ups. It helps to outline the visual elements of a document or presentation, eg typography, font, or layout. Lorem ipsum is mostly a part of a Latin text by the classical author and philosopher Cicero. Its words and letters have been changed by addition or removal, so to deliberately render its content nonsensical; it\'s not genuine, correct, or comprehensible Latin anymore. While lorem ipsum\'s still resembles classical Latin, it actually has no meaning whatsoever. As Cicero\'s text doesn\'t contain the letters K, W, or Z, alien to latin, these, and others are often inserted randomly to mimic the typographic appearence of European languages, as are digraphs not to be found in the original.</p><p>In a professional context it often happens that private or corporate clients corder a publication to be made and presented with the actual content still not being ready. Think of a news blog that\'s filled with content hourly on the day of going live. However, reviewers tend to be distracted by comprehensible content, say, a random text copied from a newspaper or the internet. The are likely to focus on the text, disregarding the layout and its elements. Besides, random text risks to be unintendedly humorous or offensive, an unacceptable risk in corporate environments. Lorem ipsum and its many variants have been employed since the early 1960ies, and quite likely since the sixteenth century.</p>',
                                'image' => [
                                    'src' => '/storage/uploads/demo/product-details/' . (($product_info[$i][3] == 4) ? 'general' : 'life') . '/diagram.png',
                                    'width' => 1120,
                                    'height' => 600
                                ],
                            ],
                            [
                                'title' => 'Benefits Diagram and Table',
                                'description' => '<p>Lorem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English to emphasise design elements over content. It\'s also called placeholder (or filler) text. It\'s a convenient tool for mock-ups. It helps to outline the visual elements of a document or presentation, eg typography, font, or layout. Lorem ipsum is mostly a part of a Latin text by the classical author and philosopher Cicero. Its words and letters have been changed by addition or removal, so to deliberately render its content nonsensical; it\'s not genuine, correct, or comprehensible Latin anymore. While lorem ipsum\'s still resembles classical Latin, it actually has no meaning whatsoever. As Cicero\'s text doesn\'t contain the letters K, W, or Z, alien to latin, these, and others are often inserted randomly to mimic the typographic appearence of European languages, as are digraphs not to be found in the original.</p><p>In a professional context it often happens that private or corporate clients corder a publication to be made and presented with the actual content still not being ready. Think of a news blog that\'s filled with content hourly on the day of going live. However, reviewers tend to be distracted by comprehensible content, say, a random text copied from a newspaper or the internet. The are likely to focus on the text, disregarding the layout and its elements. Besides, random text risks to be unintendedly humorous or offensive, an unacceptable risk in corporate environments. Lorem ipsum and its many variants have been employed since the early 1960ies, and quite likely since the sixteenth century.</p>',
                                'image' => [
                                    'src' => '/storage/uploads/demo/product-details/' . (($product_info[$i][3] == 4) ? 'general' : 'life') . '/table.png',
                                    'width' => 1120,
                                    'height' => 820
                                ],
                            ],
                        ],
                        'my-mm' => [
                            [
                                'title' => 'အကြောင်းအရာ',
                                'description' => '<p>သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။</p><p>သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။</p>',
                                'image' => [
                                    'src' => '/storage/uploads/demo/product-details/' . (($product_info[$i][3] == 4) ? 'general' : 'life') . '/diagram.png',
                                    'width' => 1120,
                                    'height' => 600
                                ],
                            ],
                            [
                                'title' => 'အကြောင်းအရာ',
                                'description' => '<p>သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။</p><p>သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။</p>',
                                'image' => '/storage/uploads/demo/product-details/general/table.png',
                                'image' => [
                                    'src' => '/storage/uploads/demo/product-details/' . (($product_info[$i][3] == 4) ? 'general' : 'life') . '/table.png',
                                    'width' => 1120,
                                    'height' => 820
                                ],
                            ]
                        ],
                        'zh-cn' => [
                            [
                                'title' => '夏川面結地勝覧署喜金亡無就事天',
                                'description' => '<p>新社違育人交日主根界際連。幹製高心破事候晴腰無舌一取行意野改。存分軒余調能義以文期浩季佐際連届止導県功。高標催極用結枝動総暮護納意司。島賠甲分画件史訪合見詳問歳気挑高知打月松。虫元記止表購途桂料記少今治。手康権術込著中井今必人終。育様美幕求氏後塾政中抗編記走表。迫相示良提入様立発料問変泉返蒼都平。</p><p>中岩宣尚王激失母分階施級。夏川面結地勝覧署喜金亡無就事天。社意度恵症出助中責豪作車対質。聞片上徳覧質属側体自左員査言残加昨白。作気関変業盤決訴処耳前儲。源平無原子位都点分活首止聞気応府自未党孤。方金話度終面凱邦形全覧後覧的愛扱。革県式分料流地入籍断断情。使聞体徹的役書強察分種務家林困功入問加。指番国成統常期術全場夜本</p>',
                                'image' => [
                                    'src' => '/storage/uploads/demo/product-details/' . (($product_info[$i][3] == 4) ? 'general' : 'life') . '/diagram.png',
                                    'width' => 1120,
                                    'height' => 600
                                ],
                            ],
                            [
                                'title' => '夏川面結地勝覧署喜金亡無就事天',
                                'description' => '<p>新社違育人交日主根界際連。幹製高心破事候晴腰無舌一取行意野改。存分軒余調能義以文期浩季佐際連届止導県功。高標催極用結枝動総暮護納意司。島賠甲分画件史訪合見詳問歳気挑高知打月松。虫元記止表購途桂料記少今治。手康権術込著中井今必人終。育様美幕求氏後塾政中抗編記走表。迫相示良提入様立発料問変泉返蒼都平。</p><p>中岩宣尚王激失母分階施級。夏川面結地勝覧署喜金亡無就事天。社意度恵症出助中責豪作車対質。聞片上徳覧質属側体自左員査言残加昨白。作気関変業盤決訴処耳前儲。源平無原子位都点分活首止聞気応府自未党孤。方金話度終面凱邦形全覧後覧的愛扱。革県式分料流地入籍断断情。使聞体徹的役書強察分種務家林困功入問加。指番国成統常期術全場夜本</p>',
                                'image' => [
                                    'src' => '/storage/uploads/demo/product-details/' . (($product_info[$i][3] == 4) ? 'general' : 'life') . '/table.png',
                                    'width' => 1120,
                                    'height' => 820
                                ],
                            ]
                        ],
                    ]),
                    'category_id' => $product_info[$i][3],
                    'is_active' => TRUE,
                    'is_home' => ($i < 4) ? TRUE : FALSE,
                    'slug_url' => Str::slug($product_info[$i][0], '-'),
                    'quote_machine_name' => 'quotes/general/' . Str::slug($product_info[$i][0], '-'),
                    'claim_machine_name' => 'claim/general/' . Str::slug($product_info[$i][0], '-'),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            } //End of products

            $blogs[] = [
                'title' => json_encode([
                    'en-us' => 'Test Blogs ' . ($i + 1),
                    'my-mm' => 'စမ်းသပ် စာ ' . ($i + 1),
                    'zh-cn' => '高標催極用 ' . ($i + 1)
                ]),
                'content' => json_encode([
                    'en-us' => '<p>Lorem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English to emphasise design elements over content. It\'s also called placeholder (or filler) text. It\'s a convenient tool for mock-ups. It helps to outline the visual elements of a document or presentation, eg typography, font, or layout. Lorem ipsum is mostly a part of a Latin text by the classical author and philosopher Cicero. Its words and letters have been changed by addition or removal, so to deliberately render its content nonsensical; it\'s not genuine, correct, or comprehensible Latin anymore. While lorem ipsum\'s still resembles classical Latin, it actually has no meaning whatsoever. As Cicero\'s text doesn\'t contain the letters K, W, or Z, alien to latin, these, and others are often inserted randomly to mimic the typographic appearence of European languages, as are digraphs not to be found in the original.</p><p>In a professional context it often happens that private or corporate clients corder a publication to be made and presented with the actual content still not being ready. Think of a news blog that\'s filled with content hourly on the day of going live. However, reviewers tend to be distracted by comprehensible content, say, a random text copied from a newspaper or the internet. The are likely to focus on the text, disregarding the layout and its elements. Besides, random text risks to be unintendedly humorous or offensive, an unacceptable risk in corporate environments. Lorem ipsum and its many variants have been employed since the early 1960ies, and quite likely since the sixteenth century.</p>',
                    'my-mm' => '<p>သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။</p><p>သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။</p>',
                    'zh-cn' => '<p>新社違育人交日主根界際連。幹製高心破事候晴腰無舌一取行意野改。存分軒余調能義以文期浩季佐際連届止導県功。高標催極用結枝動総暮護納意司。島賠甲分画件史訪合見詳問歳気挑高知打月松。虫元記止表購途桂料記少今治。手康権術込著中井今必人終。育様美幕求氏後塾政中抗編記走表。迫相示良提入様立発料問変泉返蒼都平。</p><p>中岩宣尚王激失母分階施級。夏川面結地勝覧署喜金亡無就事天。社意度恵症出助中責豪作車対質。聞片上徳覧質属側体自左員査言残加昨白。作気関変業盤決訴処耳前儲。源平無原子位都点分活首止聞気応府自未党孤。方金話度終面凱邦形全覧後覧的愛扱。革県式分料流地入籍断断情。使聞体徹的役書強察分種務家林困功入問加。指番国成統常期術全場夜本</p>'
                ]),
                'images' => json_encode([
                    '/storage/uploads/demo/1.jpg',
                    '/storage/uploads/demo/2.jpg',
                    '/storage/uploads/demo/3.jpg',
                    '/storage/uploads/demo/4.jpg',
                ]),
                'url_slug' => Str::slug('Test Blogs ' . ($i + 1), '-'),
                'status' => 'published',
                'main_category' => 2,
                'category_id' => json_encode([5, 6]),
                'author_id' => 1,
                'featured' => false,
                'promoted' => false,
                'related_products' => json_encode([$collection->random(), $collection->random()]),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];

            $jobs[] = [
                'position' => json_encode([
                    'en-us' => 'Vacant Job ' . ($i + 1),
                    'my-mm' => 'အားလပ် အလုပ် ' . ($i + 1),
                    'zh-cn' => '高標催極用 ' . ($i + 1)
                ]),
                'department' => json_encode([
                    'en-us' => 'Loan Department',
                    'my-mm' => 'ချေးငွေဌာန',
                    'zh-cn' => '高標催極用 幹製高心'
                ]),
                'description' => json_encode([
                    'en-us' => '<p>Lorem ipsum is a pseudo-Latin text used in web design, typography, layout, and printing in place of English to emphasise design elements over content. It\'s also called placeholder (or filler) text. It\'s a convenient tool for mock-ups. It helps to outline the visual elements of a document or presentation, eg typography, font, or layout. Lorem ipsum is mostly a part of a Latin text by the classical author and philosopher Cicero. Its words and letters have been changed by addition or removal, so to deliberately render its content nonsensical; it\'s not genuine, correct, or comprehensible Latin anymore. While lorem ipsum\'s still resembles classical Latin, it actually has no meaning whatsoever. As Cicero\'s text doesn\'t contain the letters K, W, or Z, alien to latin, these, and others are often inserted randomly to mimic the typographic appearence of European languages, as are digraphs not to be found in the original.</p><p>In a professional context it often happens that private or corporate clients corder a publication to be made and presented with the actual content still not being ready. Think of a news blog that\'s filled with content hourly on the day of going live. However, reviewers tend to be distracted by comprehensible content, say, a random text copied from a newspaper or the internet. The are likely to focus on the text, disregarding the layout and its elements. Besides, random text risks to be unintendedly humorous or offensive, an unacceptable risk in corporate environments. Lorem ipsum and its many variants have been employed since the early 1960ies, and quite likely since the sixteenth century.</p>',
                    'my-mm' => '<p>သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။</p><p>သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေး ဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။</p>',
                    'zh-cn' => '<p>新社違育人交日主根界際連。幹製高心破事候晴腰無舌一取行意野改。存分軒余調能義以文期浩季佐際連届止導県功。高標催極用結枝動総暮護納意司。島賠甲分画件史訪合見詳問歳気挑高知打月松。虫元記止表購途桂料記少今治。手康権術込著中井今必人終。育様美幕求氏後塾政中抗編記走表。迫相示良提入様立発料問変泉返蒼都平。</p><p>中岩宣尚王激失母分階施級。夏川面結地勝覧署喜金亡無就事天。社意度恵症出助中責豪作車対質。聞片上徳覧質属側体自左員査言残加昨白。作気関変業盤決訴処耳前儲。源平無原子位都点分活首止聞気応府自未党孤。方金話度終面凱邦形全覧後覧的愛扱。革県式分料流地入籍断断情。使聞体徹的役書強察分種務家林困功入問加。指番国成統常期術全場夜本</p>',
                ]),
                'due_text' => json_encode([
                    'en-us' => 'Open until candidate identified',
                    'my-mm' => 'သင့်တော်သူရသည့် အထိ ဖွင့်ထားပါသည်',
                    'zh-cn' => '高標催極用 幹製高心'
                ]),
                'due_date' =>  date('Y-m-d', strtotime('2022-04-30')),
                'slug_url' => Str::slug('Vacant Job ' . ($i + 1), '-'),
                'is_vacant' => TRUE,
                'instant' => FALSE,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
        }

        $message = '<li>Sample data of Products has been successfully imported.</li>';

        Page::insert($pages);
        $message .= '<li>Sample data of Pages has been successfully imported.</li>';

        /*News::insert($news);
        $message .= '<li>Sample data of News has been successfully imported.</li>';*/

        blog::insert($blogs);
        $message .= '<li>Sample data of Blogs has been successfully imported.</li>';

        Job::insert($jobs);
        $message .= '<li>Sample data of Job Vacancies has been successfully imported.</li>';

        /*CSR::insert($csrs);
        $message .= '<li>Sample data of CSRs has been successfully imported.</li>';*/

        return redirect()->route('admin#dashboard')->with(['success_message' => '<ul>' . $message . '</ul>']);
    }
}
