class BooksController < ApplicationController
    def index 
        @books = Book.all 
    end

    def new 
        @book = Book.new 
    end 
    def destroy
        @book = Book.find(params[:id])
        @book.destroy
        redirect_to root_path , status: :see_other
    end
    def show 
        @book = Book.find(params[:id])
    end

    def create 
        @book = Book.new(book_params)
        @book.admin_id = current_admin.id
        @book.save!
        if @book.save!
            redirect_to books_path
        else 
            render :new , status: :unprocessable_entity
        end
    end

    def edit 
        # authorize! :edit, @role
        @book = Book.find(params[:id])
    end

    def update
        @book = Book.find(params[:id])

        if @book.update(book_params)
            redirect_to @book
        else
            render :edit , status::unprocessable_entity
        end
    end
    def current_user
        current_admin
      end
            



    private

        def book_params
            params.require(:book).permit(:name,:price,:description,:admin_id,:image)
          
        end


end
