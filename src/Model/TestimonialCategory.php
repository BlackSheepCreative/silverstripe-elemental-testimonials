<?php

namespace Dynamic\Elements\Model;

use Dynamic\Elements\Elements\ElementTestimonials;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\FieldType\DBVarchar;

/**
 * Class TestimonialCategory
 * @package Dynamic\Elements\Model
 *
 * @property string $Title
 */
class TestimonialCategory extends DataObject
{
    /**
     * @var string
     */
    private static string $singular_name = 'Category';

    /**
     * @var string
     */
    private static string $plural_name = 'Categories';

    /**
     * @var string
     */
    private static string $table_name = 'TestimonialCategory';

    /**
     * @var array
     */
    private static array $db = [
        'Title' => DBVarchar::class,
    ];

    /**
     * @var array
     */
    private static array $belongs_many_many = [
        'Testimonials' => Testimonial::class,
        'TestimonialElements' => ElementTestimonials::class,
    ];

    /**
     * @param null $member
     * @param array $context
     * @return bool
     */
    public function canCreate($member = null, $context = [])
    {
        return Testimonial::singleton()->canCreate($member, $context);
    }

    /**
     * @param null $member
     * @return bool
     */
    public function canEdit($member = null)
    {
        return Testimonial::singleton()->canEdit($member);
    }

    /**
     * @param null $member
     * @return bool
     */
    public function canDelete($member = null)
    {
        return Testimonial::singleton()->canDelete($member);
    }

    /**
     * @param null $member
     * @return bool
     */
    public function canView($member = null)
    {
        return true;
    }
}
