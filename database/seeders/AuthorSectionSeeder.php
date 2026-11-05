<?php

namespace Database\Seeders;

use App\Models\AuthorSection;
use App\Services\AuthorImages;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuthorSectionSeeder extends Seeder
{
    /**
     * Папка внутри storage, куда складываются изображения разделов.
     */
    protected string $targetDirectory = 'author-sections';

    public function __construct(
        protected AuthorImages $images = new AuthorImages,
    ) {}

    public function run(): void
    {
        $sections = [
            [
                'title' => 'Защита авторских прав и интеллектуальной собственности',
                'slug' => 'ap-is',
                'number' => 1,
                'description' => 'То, что ваше – ваше. И никак иначе. До тех пор, пока, Вы, документально, не передали Права кому-либо или не разделили их в Смежные. Мы не сидим. Сложа руки - тем более. Сможем и проконсультировать, и выявить Право, и защитить его, и даже зарегистрировать.',
                'img' => 'AP-SI_main',
                'icon' => 'law-52',
                'order' => 1,
            ],
            [
                'title' => 'Брендинг и фирменный стиль',
                'slug' => 'firma',
                'number' => 2,
                'description' => 'Задумались о персонализации и брендировании своего Дела или целой Организации? Не думайте долго - вредно. Мы всё сделаем за вас. В соответствии с трендами рынка Брендинга или в лучших и нетленных традициях Бренд-Индустрии.',
                'img' => 'firma_main',
                'icon' => 'law-12',
                'order' => 2,
            ],
            [
                'title' => 'SMM / СММ / Позиционирование бренда в онлайн-пространстве',
                'slug' => 'smm',
                'number' => 3,
                'description' => 'Всё ещё мечтаете продвигаться в соц.сетях, мессенджерах и Поисковых Системах? И правильно делаете! Любое продвижение в Онлайне (пока в Интернет сохраняется выход) – неотъемлимый и обязательный процесс на пути к Успеху (самому успешному).',
                'img' => 'SMM_main',
                'icon' => 'law-101',
                'order' => 3,
            ],
            [
                'title' => 'PR, маркетинг и аналитические изыскания',
                'slug' => 'marketing',
                'number' => 4,
                'description' => 'Устали от «Водолеев» маркетинга и некомпетентной обработки данных? Мы тоже. Поэтому, в своё время, и получали профильную «Вышку», и практикуем уже более 15 лет. За свои циферки, отвечаем на любые вопросы и уточнения.',
                'img' => 'marketing_main',
                'icon' => 'law-04',
                'order' => 4,
            ],
            [
                'title' => 'Эвенты, события, мероприятия и промоушн',
                'slug' => 'events',
                'number' => 5,
                'description' => 'Сил больше нет на унылые корпоративы формата «в салат» и «Скучно’пати»? Не знаете, какое мероприятие организовать для Бренда? Не понимаете, надо ли оно Вам, в принципе? Подскажем, обсудим, примем (самое волевое) решение за Вас.',
                'img' => 'events_main',
                'icon' => 'law-17',
                'order' => 5,
            ],
            [
                'title' => 'Дизайн, разработка, производство и согласование рекламы',
                'slug' => 'reklama',
                'number' => 6,
                'description' => 'Девочки из рекламных агентств не внушают доверия и утомили однотипной «шаблонщиной»? Да. И нас. У нас нет таких девочек. Нет даже подающих надежды мальчиков. Суровые опытом и знаниями мужчины готовы взять любую задачу в свои умелые руки.',
                'img' => 'reklama_main',
                'icon' => 'law-104',
                'order' => 6,
            ],
            [
                'title' => 'Судебная практика в авторском праве и интеллектуальной собственности',
                'slug' => 'sudebka',
                'number' => 7,
                'description' => 'Сомневаетесь и опасаетесь судебных тяжб? По какой причине? Мы всё подготовим, всё подадим и будем держать вас в курсе. И не только в курсе, но и за руку. В самые тяжёлые и ответственные моменты.',
                'img' => 'sudebka_main',
                'icon' => 'law-21',
                'order' => 7,
            ],
        ];

        foreach ($sections as $section) {
            $authorSection = AuthorSection::updateOrCreate(
                ['slug' => $section['slug']],
                [
                    'title' => $section['title'],
                    'number' => $section['number'],
                    'description' => $section['description'],
                    'img' => $this->storeImage($section['img']),
                    'icon' => $section['icon'],
                    'order' => $section['order'],
                ]
            );

            DB::table('seo_data')->upsert(
                [[
                    'url' => 'avtor/'.$section['slug'],
                    'seo_title' => $section['title'],
                    'seo_description' => Str::limit($section['description'], 160),
                    'page_title' => $section['title'],
                    'seoable_id' => $authorSection->id,
                    'seoable_type' => AuthorSection::class,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]],
                ['url'],
                ['seo_title', 'seo_description', 'page_title', 'seoable_id', 'seoable_type', 'updated_at']
            );
        }
    }

    /**
     * Скопировать изображение раздела в storage и вернуть путь к нему на public-диске.
     */
    protected function storeImage(string $name): ?string
    {
        $target = $this->images->store($name, $this->targetDirectory);

        if ($target === null) {
            $this->command?->warn('Изображение «'.$name.'» не найдено в каталоге public/tmp/tihon');
        }

        return $target;
    }

    /**
     * Каталог с исходными изображениями разделов.
     */
    public function sourceDirectory(): ?string
    {
        return $this->images->sourceDirectory();
    }
}
