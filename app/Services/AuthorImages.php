<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class AuthorImages
{
    /**
     * Варианты каталога с исходными изображениями разделов внутри public.
     */
    protected array $sourceDirectories = [
        'tmp/tihon',
        ' tmp/tihon',
    ];

    /**
     * Счётчик использованных файлов для каждого имени изображения.
     *
     * @var array<string, int>
     */
    protected array $usedImages = [];

    /**
     * Каталог с исходными изображениями разделов.
     */
    public function sourceDirectory(): ?string
    {
        foreach ($this->sourceDirectories as $relative) {
            $path = public_path($relative);

            if (is_dir($path)) {
                return $path;
            }
        }

        foreach (glob(public_path('*'), GLOB_ONLYDIR) as $directory) {
            foreach (glob($directory.'/tihon', GLOB_ONLYDIR) as $candidate) {
                return $candidate;
            }
        }

        return null;
    }

    /**
     * Подкаталоги с исходными изображениями (например «Подразделы_1»).
     *
     * @return array<int, string>
     */
    public function sourceSubDirectories(string $name): array
    {
        $directory = $this->sourceDirectory();

        if ($directory === null) {
            return [];
        }

        $directories = [];

        foreach (glob($directory.'/*', GLOB_ONLYDIR) as $path) {
            if (mb_strtolower(basename($path)) === mb_strtolower($name)) {
                $directories[] = $path;
            }
        }

        return $directories;
    }

    /**
     * Скопировать изображение в storage и вернуть путь к нему относительно public-диска.
     */
    public function store(string $name, string $targetDirectory, array $directories = []): ?string
    {
        $source = $this->resolveSourceFile($name, $directories);

        if ($source === null) {
            return null;
        }

        $filename = preg_replace('/[^\w\-.]+/u', '_', basename($source));
        $filename = preg_replace('/_+/', '_', $filename);

        $target = $targetDirectory.'/'.$filename;

        Storage::disk('public')->put($target, file_get_contents($source));

        return $target;
    }

    /**
     * Найти исходный файл изображения: сначала точное совпадение, затем пронумерованные варианты.
     */
    public function resolveSourceFile(string $name, array $directories = []): ?string
    {
        $directories = array_values(array_filter($directories, 'is_dir'));

        if ($directories === []) {
            $root = $this->sourceDirectory();

            $directories = $root === null ? [] : [$root];
        }

        $candidates = [];

        foreach ($directories as $directory) {
            foreach (glob($directory.'/*') ?: [] as $file) {
                if (! is_file($file)) {
                    continue;
                }

                $pattern = '/^'.preg_quote($name, '/').'(?:[-_](\d+))?(\.[A-Za-z0-9]+)$/i';

                if (preg_match($pattern, basename($file), $matches) !== 1) {
                    continue;
                }

                $candidates[] = [
                    'path' => $file,
                    'index' => ($matches[1] ?? '') === '' ? 1 : (int) $matches[1],
                ];
            }
        }

        if ($candidates === []) {
            return null;
        }

        usort($candidates, fn (array $a, array $b) => $a['index'] <=> $b['index']);

        $key = $name.'#'.md5(implode('|', $directories));

        $position = $this->usedImages[$key] ?? 0;

        $this->usedImages[$key] = $position + 1;

        return $candidates[$position]['path'] ?? null;
    }
}
