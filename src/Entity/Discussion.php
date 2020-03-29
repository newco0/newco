<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DiscussionRepository")
 */
class Discussion
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    private $date_register;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_update;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date_delete;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\users", inversedBy="discussions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $exp;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\users", inversedBy="discussions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $dest;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\DiscussionHistory", mappedBy="discussion", orphanRemoval=true)
     */
    private $discussionHistories;

    public function __construct()
    {
        $this->setDateRegister(new \DateTime());
        $this->setDateUpdate(new \DateTime());
        $this->discussionHistories = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateRegister(): ?\DateTimeInterface
    {
        return $this->date_register;
    }

    public function setDateRegister(\DateTimeInterface $date_register): self
    {
        $this->date_register = $date_register;

        return $this;
    }

    public function getDateUpdate(): ?\DateTimeInterface
    {
        return $this->date_update;
    }

    public function setDateUpdate(\DateTimeInterface $date_update): self
    {
        $this->date_update = $date_update;

        return $this;
    }

    public function getDateDelete(): ?\DateTimeInterface
    {
        return $this->date_delete;
    }

    public function setDateDelete(\DateTimeInterface $date_delete): self
    {
        $this->date_delete = $date_delete;

        return $this;
    }

    public function getIdExp(): ?users
    {
        return $this->exp;
    }

    public function setIdExp(?users $exp): self
    {
        $this->id_exp = $exp;

        return $this;
    }

    public function getDest(): ?users
    {
        return $this->dest;
    }

    public function setDest(?users $dest): self
    {
        $this->dest = $dest;

        return $this;
    }

    /**
     * @return Collection|DiscussionHistory[]
     */
    public function getDiscussionHistories(): Collection
    {
        return $this->discussionHistories;
    }

    public function addDiscussionHistory(DiscussionHistory $discussionHistory): self
    {
        if (!$this->discussionHistories->contains($discussionHistory)) {
            $this->discussionHistories[] = $discussionHistory;
            $discussionHistory->setDiscussion($this);
        }

        return $this;
    }

    public function removeDiscussionHistory(DiscussionHistory $discussionHistory): self
    {
        if ($this->discussionHistories->contains($discussionHistory)) {
            $this->discussionHistories->removeElement($discussionHistory);
            // set the owning side to null (unless already changed)
            if ($discussionHistory->getDiscussion() === $this) {
                $discussionHistory->setDiscussion(null);
            }
        }

        return $this;
    }
}
