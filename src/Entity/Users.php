<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UsersRepository")
 */
class Users
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_birth;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_register;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_update;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_delete;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Friend", mappedBy="id_user", orphanRemoval=true)
     */
    private $friends;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Publication", mappedBy="user", orphanRemoval=true)
     */
    private $publications;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Interaction", mappedBy="user")
     */
    private $interactions;

    public function __construct()
    {
        $this->friends = new ArrayCollection();
        $this->publications = new ArrayCollection();
        $this->interactions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getDateBirth(): ?\DateTimeInterface
    {
        return $this->date_birth;
    }

    public function setDateBirth(\DateTimeInterface $date_birth): self
    {
        $this->date_birth = $date_birth;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
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

    /**
     * @return Collection|Friend[]
     */
    public function getFriends(): Collection
    {
        return $this->friends;
    }

    public function addFriend(Friend $friend): self
    {
        if (!$this->friends->contains($friend)) {
            $this->friends[] = $friend;
            $friend->setIdUser($this);
        }

        return $this;
    }

    public function removeFriend(Friend $friend): self
    {
        if ($this->friends->contains($friend)) {
            $this->friends->removeElement($friend);
            // set the owning side to null (unless already changed)
            if ($friend->getIdUser() === $this) {
                $friend->setIdUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Publication[]
     */
    public function getPublications(): Collection
    {
        return $this->publications;
    }

    public function addPublication(Publication $publication): self
    {
        if (!$this->publications->contains($publication)) {
            $this->publications[] = $publication;
            $publication->setUser($this);
        }

        return $this;
    }

    public function removePublication(Publication $publication): self
    {
        if ($this->publications->contains($publication)) {
            $this->publications->removeElement($publication);
            // set the owning side to null (unless already changed)
            if ($publication->getUser() === $this) {
                $publication->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Interaction[]
     */
    public function getInteractions(): Collection
    {
        return $this->interactions;
    }

    public function addInteraction(Interaction $interaction): self
    {
        if (!$this->interactions->contains($interaction)) {
            $this->interactions[] = $interaction;
            $interaction->setUser($this);
        }

        return $this;
    }

    public function removeInteraction(Interaction $interaction): self
    {
        if ($this->interactions->contains($interaction)) {
            $this->interactions->removeElement($interaction);
            // set the owning side to null (unless already changed)
            if ($interaction->getUser() === $this) {
                $interaction->setUser(null);
            }
        }

        return $this;
    }
}
