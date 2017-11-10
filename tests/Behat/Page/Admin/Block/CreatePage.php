<?php

/**
 * This file was created by the developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * another great project.
 * You can find more information about us on https://bitbag.shop and write us
 * an email on kontakt@bitbag.pl.
 */

declare(strict_types=1);

namespace Tests\BitBag\CmsPlugin\Behat\Page\Admin\Block;

use Sylius\Behat\Page\Admin\Crud\CreatePage as BaseCreatePage;
use Tests\BitBag\CmsPlugin\Behat\Behaviour\ContainsError;
use Webmozart\Assert\Assert;

/**
 * @author Mikołaj Król <mikolaj.krol@bitbag.pl>
 */
final class CreatePage extends BaseCreatePage implements CreatePageInterface
{
    use ContainsError;
    /**
     * {@inheritdoc}
     */
    public function fillCode(string $code): void
    {
        $this->getDocument()->fillField('Code', $code);
    }

    /**
     * {@inheritdoc}
     */
    public function uploadImage(string $image): void
    {
        $path = __DIR__ . '/../../../Resources/images/' . $image;

        Assert::fileExists($path);

        $this->getDocument()
            ->attachFileToField('Choose file', $path);
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function fillName(string $name): void
    {
        $this->getDocument()->fillField('Name', $name);
    }

    /**
     * {@inheritdoc}
     */
    public function fillLink(string $link): void
    {
        $this->getDocument()->fillField('Link', $link);
    }

    /**
     * {@inheritdoc}
     */
    public function fillContent(string $content): void
    {
        $this->getDocument()->fillField('Content', $content);
    }

    /**
     * {@inheritdoc}
     */
    public function disable(): void
    {
        $this->getDocument()->uncheckField('Enabled');
    }
}