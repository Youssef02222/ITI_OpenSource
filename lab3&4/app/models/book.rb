class Book < ApplicationRecord
  has_one_attached :image
  belongs_to :admin
  validates :name ,:price , :description ,:image , :admin_id , presence: true 
end
