class AddAdminRefToBooks < ActiveRecord::Migration[7.0]
  def change
    add_reference :books, :admin, null: false, foreign_key: true
  end
end
