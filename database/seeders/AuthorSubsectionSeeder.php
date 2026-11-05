<?php

namespace Database\Seeders;

use App\Models\AuthorSection;
use App\Models\AuthorSubsection;
use App\Services\AuthorImages;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuthorSubsectionSeeder extends Seeder
{
    /**
     * Папка внутри storage, куда складываются изображения подразделов.
     */
    protected string $targetDirectory = 'author-subsections';

    public function __construct(
        protected AuthorImages $images = new AuthorImages,
    ) {}

    public function run(): void
    {
        $sections = [
            [
                'section' => 'ap-is',
                'folder' => 'Подразделы_1',
                'subsections' => [
                    [
                        'title' => 'Сопровождение',
                        'slug' => 'ap-is/support',
                        'number' => '1.1.1',
                        'description' => 'Крепко, берём ваше Творчество за руку и сопровождаем его от создания до появления Прав и их регистрации.',
                        'img' => 'AP-SI_supp',
                        'price' => 22200,
                        'cross_reference' => '2.1.3',
                    ],
                    [
                        'title' => 'Регистрация авторских прав и интеллектуальной собственности',
                        'slug' => 'ap-is/fips',
                        'number' => '1.1.2',
                        'description' => 'Твёрдо и чётко регистрируем все виды Авторских Прав и Интеллектуальной собственности. А, также, любые Патенты и научные изыскания. Недорого, но и не дёшево.',
                        'img' => 'AP-SI_fips',
                        'price' => 66000,
                    ],
                    [
                        'title' => 'Досудебная защита авторских и смежных прав',
                        'slug' => 'ap-is/dosudebka',
                        'number' => '1.1.3',
                        'description' => 'Наверняка, удивим тех, кто решил, что ваше Творчество или результат интеллектуального труда – не ваша собственность. Перманентно, принуждаем удивляться уже более 15 лет.',
                        'img' => 'AP-SI_dosud',
                        'price' => 44400,
                        'cross_reference' => '7.1.1',
                    ],
                    [
                        'title' => 'Судебная защита авторских и смежных прав',
                        'slug' => 'ap-is/sudebka',
                        'number' => '1.1.4',
                        'description' => 'Принуждаем в судебном порядке удивлённых Досудебными Претензиями к уважению и исполнению таких простых процессов, как соблюдение Авторских и Смежных Прав.',
                        'img' => 'AP-SI_sud',
                        'price' => 88800,
                    ],
                ],
            ],
            [
                'section' => 'firma',
                'folder' => 'Подразделы_2',
                'subsections' => [
                    [
                        'title' => 'Разработка и внедрение логотипов, брендов и торговых марок',
                        'slug' => 'firma/brand',
                        'number' => '2.1.1',
                        'description' => 'С самых ранних этапов профессиональной деятельности, мы стараемся не только разрабатывать, но и выводить на Рынок и сопровождать тех, кто доверил нам самое основное – свою Эмблему.',
                        'img' => 'firma_razrabo',
                        'price' => 111100,
                    ],
                    [
                        'title' => 'Ре-брендинг, усиление фирменного стиля и пост-брендинг',
                        'slug' => 'firma/re-brand',
                        'number' => '2.1.2',
                        'description' => 'Требуется срочная «реанимация» бренда или фирменного стиля? Надоел логотип, которому много лет? Нам тоже. Не можете смотреть на весь брендинг, с которым начинали? Мы тоже! Ежедневно, мы подтягиваем свои скиллы/навыки, чтобы не только видеть, но и знать: от какого Лого и Брендинга пора отказываться, какой необходимо, немного, доработать. А про который стоит забыть в тот же день…',
                        'img' => 'firma_re-brand',
                        'price' => 55500,
                        'cross_reference' => '1.1.2',
                    ],
                    [
                        'title' => 'Регистрация логотипов, фирменных стилей и авторских элементов',
                        'slug' => 'firma/fips',
                        'number' => '2.1.3',
                        'description' => 'Твёрдо и чётко регистрируем все виды Авторских Прав и Интеллектуальной собственности. А, также, любые Патенты и научные изыскания. Недорого, но и не дёшево.',
                        'img' => 'AP-SI_fips',
                        'price' => 66600,
                    ],
                ],
            ],
            [
                'section' => 'smm',
                'folder' => 'Подразделы_3',
                'subsections' => [
                    [
                        'title' => 'Разработка кампании и стратегии продвижения',
                        'slug' => 'smm/posev',
                        'number' => '3.1.1',
                        'description' => 'Не знаете, как «двигать» продукт в массы или как задать эксклюзивность авторской или лимитированной продукции? Переставайте не знать! Мы не только всё проанализируем, срастим, вычленим и протрудим, но и дадим посмотреть. Потребителю. Вашему любимому, необходимому и самому важному - вашему Потребителю.',
                        'img' => 'SMM_posev',
                        'price' => 55550,
                    ],
                    [
                        'title' => 'Консалтинг по позиционированию в соц.сетях и онлайн-пространстве',
                        'slug' => 'smm/consalting',
                        'number' => '3.1.2',
                        'description' => 'Не готовы тратиться на авторскую разработку и эксклюзивную стратегию? Приходите к нам на чай! Мы готовы обсудить, оценить, порекомендовать и попросить за это оплату! Ведь, каждая минута нашего с вами драгоценного, просто, обязана оплачиваться. Роскошный чаёк без оплат. Угощаем от широты всей души!',
                        'img' => 'SMM_consalting',
                        'price' => 33330,
                    ],
                    [
                        'title' => 'SMM-сопровождение и имиджевый посев в соц.сетях и онлайн-пространстве',
                        'slug' => 'smm/support',
                        'number' => '3.1.3',
                        'description' => 'Устали от «молодых да дерзких» с безумными прайсами на услуги? Мы тоже. Понимаем. Поэтому, предлагаем самые широкие варианты и пакеты обслуживание для вашего личного Бренда, организации или небольшой деятельности ИП. Ниже и выше в Рынке бывает. Мы стараемся держаться «золотой середины».',
                        'img' => 'SMM_support',
                        'price' => 22200,
                    ],
                ],
            ],
            [
                'section' => 'marketing',
                'folder' => 'Подразделы_4',
                'subsections' => [
                    [
                        'title' => 'Разработка и реализация маркетинговых и PR-кампаний',
                        'slug' => 'marketing/campaign',
                        'number' => '4.1.1',
                        'description' => 'Помните, про легендарную «рекламу «Йоты» на попе у койота»? А про «Правила «Фостерс» дают в Астралии» с русско-язычным посевом? Про гениальный и масштабный посев в Рунете и в офлайнеэтого вот всего? Вот-вот. Можем также и для вас. Сможем-сможем…',
                        'img' => 'marketing_campaign',
                        'price' => 111100,
                    ],
                    [
                        'title' => 'Исследования и изыскания в области маркетинга, PR и спроса',
                        'slug' => 'marketing/research',
                        'number' => '4.1.2',
                        'description' => 'Чего мы только не считали и не исследовали… И «Азбуки» были изучены, и громкость «Мегафона» корректировалась. И даже просчитывались стоимость и объём (такого необходимого многим) стаканчика горячего кофе «на ход ноги». И для вас подсчитаем, сведём, изучим и отрекомендуем…',
                        'img' => 'marketing_research',
                        'price' => 155510,
                    ],
                    [
                        'title' => 'Маркетинговое сопровождение и PR-кампании',
                        'slug' => 'marketing/support',
                        'number' => '4.1.3',
                        'description' => 'Понравилось, как мы всё подсчитали, проанализировали и преподнесли итогово? Нам тоже это, всегда, нравится. Поэтому, готовы сопровождать в маркетинге и изысканиях Вас и ваше Дело ежемесячно. Ежегодно. И даже еженедельно!',
                        'img' => 'marketing_support',
                        'price' => 77000,
                    ],
                ],
            ],
            [
                'section' => 'events',
                'folder' => 'Подразделы_5',
                'subsections' => [
                    [
                        'title' => 'Акции и промо',
                        'slug' => 'events/promo',
                        'number' => '5.1.1',
                        'description' => 'Любые акции и промо. Совершенно, любые промо-акции. За плечами и на руках столько Опыта, что проводим периодические акции по его промо.',
                        'img' => 'events_promo',
                        'price' => 77000,
                    ],
                    [
                        'title' => 'Авторские события и мероприятия',
                        'slug' => 'events/party',
                        'number' => '5.1.2',
                        'description' => 'Мероприятия. События. Пати. Дегустации. Эвенты. Опен-эиры. Клосед-вотэры. Энтер-экшены и Экшен-ауты. Всё, что пожелаете и всё, что с Вами утвердим…',
                        'img' => 'events_party',
                        'price' => 111000,
                    ],
                ],
            ],
            [
                'section' => 'reklama',
                'folder' => 'Подразделы_6',
                'subsections' => [
                    [
                        'title' => 'Макетирование и разработка',
                        'slug' => 'reklama/maket',
                        'number' => '6.1.1',
                        'description' => 'Любая вёрстка. Масштабные и множественные дизайны. Инженерные документы. Дизайн-проекты любой сложности.',
                        'img' => 'reklama_ maket',
                        'price' => 22200,
                    ],
                    [
                        'title' => 'Сувенирная продукция',
                        'slug' => 'reklama/souvenirs',
                        'number' => '6.1.2',
                        'description' => 'Кружки, брелоки, вымпелы, календари, коврики, значки. Надоело? Очень? Разрабатываем и реализуем любую, даже самую креативную и нестандартную сувенирную продукцию для вашего Бизнеса и для личных целей.',
                        'img' => 'reklama_sou-sou',
                        'price' => 22200,
                    ],
                    [
                        'title' => 'Рекламные изделия и конструкции',
                        'slug' => 'reklama/production',
                        'number' => '6.1.3',
                        'description' => 'Любые. Вообще. Даже крышные конструкции, которые могут согласовываться год. Даже стеллы (как на АЗС) для вашей студии флористики. И что угодно из гибкого неона - даже светящийся режим работы на весь ваш фасад.',
                        'img' => 'reklama_prod',
                        'price' => 33300,
                    ],
                ],
            ],
            [
                'section' => 'sudebka',
                'folder' => 'Подразделы_7',
                'subsections' => [
                    [
                        'title' => 'Судебная защита авторских и смежных прав',
                        'slug' => 'sudebka/sudebka',
                        'number' => '7.1.1',
                        'description' => 'Принуждаем в судебном порядке удивлённых Досудебными Претензиями к уважению и исполнению таких простых процессов, как соблюдение Авторских и Смежных Прав.',
                        'img' => 'AP-SI_sud',
                        'price' => 88800,
                    ],
                    [
                        'title' => 'Установление принадлежности авторских прав и интеллектуальной собственности',
                        'slug' => 'sudebka/affiliation',
                        'number' => '7.1.2',
                        'description' => 'Максимально-пристальным образом рассмотрим вашу ситуацию и вынесем реальный «диагноз». Выведем даже из правовой «комы». Как говорил Великий: «Не бывает непобедимых случаев. Случаются недоработки исследующего…».',
                        'img' => 'sudebka_affil',
                        'price' => 44400,
                    ],
                ],
            ],
        ];

        $sectionIds = [];
        $seededSlugs = [];

        foreach ($sections as $data) {
            $section = AuthorSection::where('slug', $data['section'])->first();

            if ($section === null) {
                $this->command?->warn('Раздел «'.$data['section'].'» не найден — подразделы пропущены');

                continue;
            }

            $sectionIds[] = $section->id;

            $directories = $this->images->sourceSubDirectories($data['folder']);

            foreach ($data['subsections'] as $index => $subsection) {
                $img = $this->images->store($subsection['img'], $this->targetDirectory, $directories);

                if ($img === null) {
                    $this->command?->warn('Изображение «'.$subsection['img'].'» не найдено в '.$data['folder']);
                }

                $authorSubsection = AuthorSubsection::updateOrCreate(
                    [
                        'author_section_id' => $section->id,
                        'slug' => $subsection['slug'],
                    ],
                    [
                        'title' => $subsection['title'],
                        'number' => $subsection['number'],
                        'description' => $subsection['description'],
                        'img' => $img,
                        'price' => $subsection['price'],
                        'cross_reference' => $subsection['cross_reference'] ?? null,
                        'order' => $index + 1,
                    ]
                );

                $seededSlugs[] = $subsection['slug'];

                DB::table('seo_data')->upsert(
                    [[
                        'url' => 'avtor/'.$subsection['slug'],
                        'seo_title' => $subsection['title'],
                        'seo_description' => Str::limit($subsection['description'], 160),
                        'page_title' => $subsection['title'],
                        'seoable_id' => $authorSubsection->id,
                        'seoable_type' => AuthorSubsection::class,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]],
                    ['url'],
                    ['seo_title', 'seo_description', 'page_title', 'seoable_id', 'seoable_type', 'updated_at']
                );
            }
        }

        $this->removeOutdatedSubsections($sectionIds, $seededSlugs);
    }

    /**
     * Удалить подразделы и SEO-записи, которых больше нет в исходных данных.
     *
     * @param  array<int, int>  $sectionIds
     * @param  array<int, string>  $seededSlugs
     */
    protected function removeOutdatedSubsections(array $sectionIds, array $seededSlugs): void
    {
        if ($sectionIds === []) {
            return;
        }

        AuthorSubsection::query()
            ->whereIn('author_section_id', $sectionIds)
            ->whereNotIn('slug', $seededSlugs)
            ->delete();

        DB::table('seo_data')
            ->where('seoable_type', AuthorSubsection::class)
            ->whereNotIn('url', array_map(fn (string $slug) => 'avtor/'.$slug, $seededSlugs))
            ->delete();
    }
}
