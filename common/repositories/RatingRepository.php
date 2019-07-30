<?php
namespace common\repositories;
use common\essences\UserRating;


class ratingRepository extends IRepository
{
    private $record;

    public function __construct(UserRating $rating)
    {
        $this->record = $rating;
    }

    public function getById($id)
    {
        return $this->getBy($this->record,['id'=> $id]);
    }
}
?>
<?php
